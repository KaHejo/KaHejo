<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\CompanyEnergyService;
use Illuminate\Support\Facades\Auth;

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

        // Save to database using service
        $consumption = $this->companyEnergyService->store([
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