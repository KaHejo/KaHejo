<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\CompanyEnergyService;
use Illuminate\Support\Facades\Auth;
use App\Models\Achievement;
use App\Models\UserAchievement;

class CompanyEnergyController extends Controller
{
    protected $companyEnergyService;

    public function __construct(CompanyEnergyService $companyEnergyService)
    {
        $this->companyEnergyService = $companyEnergyService;
    }

    public function index()
    {
        return view('company.index');
    }

    public function store(Request $request)
    {

        $validated = $request->validate([
            'source_type' => 'required|string',
            'consumption_amount' => 'required|numeric|min:0',
            'unit_measurement' => 'required|string',
            'activity_type' => 'required|string',
            'location_name' => 'nullable|string',
            'consumption_date' => 'required|date',
            'reporting_period' => 'required|string|in:monthly,yearly',
        ]);

        $achievements = Achievement::where('points_needed', '<=', $validated['consumption_amount'])
            ->where('category', $validated['source_type'])
            ->get();

        foreach ($achievements as $achievement) {
            $alreadyHas = UserAchievement::where('user_id', Auth::id())
            ->where('achievement_id', $achievement->id)
            ->exists();

            if (!$alreadyHas) {
            UserAchievement::create([
                'user_id' => Auth::id(),
                'achievement_id' => $achievement->id,
            ]);
            session()->flash('achievement', 'Congratulations! You have earned the achievement: ' . $achievement->name);
            $user = Auth::user();
            $user->points += $achievement->points_awarded;
            $user->save();
            }
        }

        // Save to database using service
        $consumption = $this->companyEnergyService->store([
            'user_id' => Auth::id(),
            'source_type' => $validated['source_type'],
            'consumption_amount' => $validated['consumption_amount'],
            'unit_measurement' => $validated['unit_measurement'],
            'activity_type' => $validated['activity_type'],
            'location_name' => $validated['location_name'],
            'consumption_date' => $validated['consumption_date'],
            'reporting_period' => $validated['reporting_period'],
        ]);

        $calc = $this->calculateEnergyEmission($validated['source_type'], (float)$validated['consumption_amount']);

        // Prepare result data for the view
        $result = array_merge([
            'user_name' => Auth::user()->name,
            'source_type' => $validated['source_type'],
            'consumption_amount' => $validated['consumption_amount'],
            'unit_measurement' => $validated['unit_measurement'],
            'activity_type' => $validated['activity_type'],
            'location_name' => $validated['location_name'],
            'consumption_date' => $validated['consumption_date'],
            'reporting_period' => $validated['reporting_period'],
            'calculation_date' => now()->format('Y-m-d H:i:s'),
        ], $calc);

        return view('company.result', [
            'result' => $result,
            'consumption' => $consumption
        ]);
    }

    public function history()
    {
        $consumptions = $this->companyEnergyService->getAllConsumptions();
        return view('company.history', compact('consumptions'));
    }

    public function view($id)
    {
        try {
            $consumption = $this->companyEnergyService->find($id);
            $calc = $this->calculateEnergyEmission($consumption->source_type, (float)$consumption->consumption_amount);
            
            // Prepare result data for the view
            $result = array_merge([
                'user_name' => Auth::user()->name,
                'source_type' => $consumption->source_type,
                'consumption_amount' => $consumption->consumption_amount,
                'unit_measurement' => $consumption->unit_measurement,
                'activity_type' => $consumption->activity_type,
                'location_name' => $consumption->location_name,
                'consumption_date' => $consumption->consumption_date,
                'reporting_period' => $consumption->reporting_period,
                'calculation_date' => $consumption->created_at->format('Y-m-d H:i:s'),
            ], $calc);

            return view('company.result', [
                'result' => $result,
                'consumption' => $consumption
            ]);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return redirect()->route('company.history')->with('error', 'Consumption record not found.');
        }
    }

    /**
     * Hitung jejak emisi karbon dan konversi energi dari konsumsi operasional.
     */
    private function calculateEnergyEmission(string $sourceType, float $amount): array
    {
        $source = strtolower($sourceType);

        // 1. Faktor Emisi Karbon (kg CO2e per unit) sesuai Standar Kementerian ESDM & IPCC GHG Protocol
        $emissionFactors = [
            'electricity' => 0.85, // kg CO2e / kWh (Jaringan Listrik PLN Jamali)
            'gasoline'    => 2.31, // kg CO2e / Liter (Bensin RON 90-95)
            'diesel'      => 2.68, // kg CO2e / Liter (Minyak Solar / HSD)
            'gas'         => 1.90, // kg CO2e / m3 (Gas Alam PGN/CNG)
            'lpg'         => 2.98, // kg CO2e / kg (LPG)
        ];

        // 2. Faktor Konversi Energi Primer (MJ per unit)
        $energyFactors = [
            'electricity' => 3.6,  // 1 kWh = 3.6 MJ
            'gasoline'    => 34.2, // 1 Liter = 34.2 MJ
            'diesel'      => 38.6, // 1 Liter = 38.6 MJ
            'gas'         => 38.3, // 1 m3 = 38.3 MJ
            'lpg'         => 46.1, // 1 kg = 46.1 MJ
        ];

        $factor = $emissionFactors[$source] ?? 1.0;
        $energyFactor = $energyFactors[$source] ?? 1.0;

        // Total Jejak Emisi Karbon
        $carbonKg = $amount * $factor;
        $carbonTon = $carbonKg / 1000;

        // Total Energi (MJ & GJ)
        $energyMJ = $amount * $energyFactor;
        $energyGJ = $energyMJ / 1000;

        // Ekivalensi Dampak Lingkungan
        // 1 pohon dewasa menyerap rata-rata 21.77 kg CO2/tahun
        $treesNeeded = max(1, round($carbonKg / 21.77));
        
        // Jarak tempuh mobil konvensional rata-rata (0.192 kg CO2e / km)
        $carKmEquivalent = round($carbonKg / 0.192);

        // Klasifikasi Scope GHG Protocol
        $isScope2 = ($source === 'electricity');
        $scopeName = $isScope2 ? 'Scope 2 (Indirect Electricity)' : 'Scope 1 (Direct Fuel & Gas)';

        return [
            'emission_factor'    => $factor,
            'carbon_emission_kg' => round($carbonKg, 2),
            'carbon_emission_ton'=> round($carbonTon, 3),
            'energy_mj'          => round($energyMJ, 2),
            'energy_gj'          => round($energyGJ, 3),
            'trees_needed'       => $treesNeeded,
            'car_km_equivalent'  => $carKmEquivalent,
            'scope_classification' => $scopeName,
            'is_scope_2'         => $isScope2,
        ];
    }
} 