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
} 