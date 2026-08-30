<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\CompanyEnergyConsumption;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EnergyController extends Controller
{
    /**
     * Helper to compute emissions and primary energy values.
     */
    private function calculateEnergyEmission($sourceType, $amount)
    {
        $emissionFactors = [
            'gasoline'    => 2.31, // kg CO2e per liter
            'electricity' => 0.85, // kg CO2e per kWh
            'diesel'      => 2.68, // kg CO2e per liter
            'gas'         => 1.90, // kg CO2e per m3
            'lpg'         => 2.98, // kg CO2e per kg
        ];

        $energyContentMJ = [
            'gasoline'    => 34.2, // MJ per liter
            'electricity' => 3.6,  // MJ per kWh
            'diesel'      => 38.6, // MJ per liter
            'gas'         => 38.3, // MJ per m3
            'lpg'         => 46.1, // MJ per kg
        ];

        $factor = $emissionFactors[$sourceType] ?? 1.0;
        $mjFactor = $energyContentMJ[$sourceType] ?? 3.6;

        $totalCo2Kg = $amount * $factor;
        $totalCo2Ton = $totalCo2Kg / 1000;
        $totalEnergyMJ = $amount * $mjFactor;
        $totalEnergyGJ = $totalEnergyMJ / 1000;
        $treesRequired = max(1, round($totalCo2Kg / 21.77));
        $scope = ($sourceType === 'electricity') ? 'Scope 2' : 'Scope 1';

        return [
            'emission_factor' => $factor,
            'total_co2_kg' => round($totalCo2Kg, 2),
            'total_co2_ton' => round($totalCo2Ton, 3),
            'energy_mj' => round($totalEnergyMJ, 2),
            'energy_gj' => round($totalEnergyGJ, 3),
            'trees_required' => $treesRequired,
            'scope' => $scope,
        ];
    }

    /**
     * Submit new energy consumption and compute emission analysis.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'source_type' => 'required|string|in:electricity,gasoline,diesel,gas,lpg',
            'consumption_amount' => 'required|numeric|min:0.01',
            'unit_measurement' => 'required|string|max:50',
            'activity_type' => 'required|string|in:production,office,logistics,facility,operational,transportation',
            'location_name' => 'required|string|max:255',
            'consumption_date' => 'required|date',
            'reporting_period' => 'required|string|in:daily,weekly,monthly,yearly',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Parameter konsumsi energi tidak valid.',
                'errors' => $validator->errors(),
            ], 422);
        }

        $record = CompanyEnergyConsumption::create([
            'user_id' => $request->user()->id,
            'source_type' => $request->source_type,
            'consumption_amount' => $request->consumption_amount,
            'unit_measurement' => $request->unit_measurement,
            'activity_type' => $request->activity_type,
            'location_name' => $request->location_name,
            'consumption_date' => $request->consumption_date,
            'reporting_period' => $request->reporting_period,
        ]);

        $calculation = $this->calculateEnergyEmission($request->source_type, $request->consumption_amount);

        return response()->json([
            'success' => true,
            'message' => 'Pencatatan konsumsi energi berhasil disimpan dan dihitung.',
            'data' => [
                'record' => $record,
                'document_number' => sprintf('KHJ-ENG-%06d', $record->id),
                'analysis' => $calculation,
            ],
        ], 201);
    }

    /**
     * Get paginated energy consumption records.
     */
    public function history(Request $request)
    {
        $perPage = (int)$request->input('per_page', 10);
        $sourceFilter = $request->input('source_type');

        $query = CompanyEnergyConsumption::where('user_id', $request->user()->id);

        if ($sourceFilter) {
            $query->where('source_type', $sourceFilter);
        }

        $records = $query->orderBy('consumption_date', 'desc')->paginate($perPage);

        // Enrich records with emission calculations
        $records->getCollection()->transform(function ($item) {
            $calc = $this->calculateEnergyEmission($item->source_type, $item->consumption_amount);
            $item->calculation = $calc;
            return $item;
        });

        return response()->json([
            'success' => true,
            'message' => 'Riwayat konsumsi energi berhasil dimuat.',
            'data' => $records,
        ]);
    }

    /**
     * Get specific energy consumption record details.
     */
    public function show(Request $request, $id)
    {
        $record = CompanyEnergyConsumption::where('user_id', $request->user()->id)
            ->findOrFail($id);

        $calc = $this->calculateEnergyEmission($record->source_type, $record->consumption_amount);

        return response()->json([
            'success' => true,
            'message' => 'Detail konsumsi energi berhasil dimuat.',
            'data' => [
                'id' => $record->id,
                'document_number' => sprintf('KHJ-ENG-%06d', $record->id),
                'source_type' => $record->source_type,
                'consumption_amount' => $record->consumption_amount,
                'unit_measurement' => $record->unit_measurement,
                'activity_type' => $record->activity_type,
                'location_name' => $record->location_name,
                'consumption_date' => Carbon::parse($record->consumption_date)->format('d F Y'),
                'reporting_period' => $record->reporting_period,
                'analysis' => $calc,
                'created_at' => $record->created_at,
            ],
        ]);
    }
}
