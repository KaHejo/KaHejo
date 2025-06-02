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

        //saya mau terdapat code yang otomatis tertambah ketika user sudah menyelesaikan menginputkan company_energy_consumption lalu nanti akan ada proses dimana mengecek consumption_amount, source_type yang sudah diinputkan user apakah ada yang sesuai sesuai dengan achievement yang ada di database
        $achievements = Achievement::where('points_needed', '<=', $validated['consumption_amount'])
            ->where('category', $validated['source_type'])
            ->get();

        foreach ($achievements as $achievement) {
            UserAchievement::updateOrCreate([
                'user_id' => Auth::id(),
                'achievement_id' => $achievement->id,
            ]);
            session()->flash('achievement', 'Congratulations! You have earned the achievement: ' . $achievement->name);
            //tambahkan point ke user
            $user = Auth::user();
            $user->points += $achievement->points_awarded;
            $user->save();
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

        // Prepare result data for the view
        $result = [
            'user_name' => Auth::user()->name,
            'source_type' => $validated['source_type'],
            'consumption_amount' => $validated['consumption_amount'],
            'unit_measurement' => $validated['unit_measurement'],
            'activity_type' => $validated['activity_type'],
            'location_name' => $validated['location_name'],
            'consumption_date' => $validated['consumption_date'],
            'reporting_period' => $validated['reporting_period'],
            'calculation_date' => now()->format('Y-m-d H:i:s'),
        ];

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
            
            // Prepare result data for the view
            $result = [
                'source_type' => $consumption->source_type,
                'consumption_amount' => $consumption->consumption_amount,
                'unit_measurement' => $consumption->unit_measurement,
                'activity_type' => $consumption->activity_type,
                'location_name' => $consumption->location_name,
                'consumption_date' => $consumption->consumption_date,
                'reporting_period' => $consumption->reporting_period,
                'calculation_date' => $consumption->created_at->format('Y-m-d H:i:s'),
            ];

            return view('company.result', [
                'result' => $result,
                'consumption' => $consumption
            ]);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return redirect()->route('company.history')->with('error', 'Consumption record not found.');
        }
    }
} 