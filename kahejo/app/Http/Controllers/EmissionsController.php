<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\EmissionsService;

class EmissionsController extends Controller
{
    protected $emissionsService;

    public function __construct(EmissionsService $emissionsService)
    {
        $this->emissionsService = $emissionsService;
    }

    public function index()
    {
        return view('emissions.form');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'source_type' => 'required|string',
            'consumption_amount' => 'required|numeric|min:0',
            'unit' => 'required|string',
            'emission_factor' => 'required|numeric|min:0',
            'emission_type' => 'required|string',
            'emission_date' => 'required|date',
            'location' => 'required|string',
        ]);

        // Calculate emissions
        $result = $this->emissionsService->calculateEmissions(
            $validated['source_type'],
            $validated['consumption_amount'],
            $validated['unit'],
            $validated['emission_factor'],
            $validated['emission_type'],
            $validated['emission_date'],
            $validated['location']
        );

        // Save to database
        $emission = $this->emissionsService->save($result);

        return view('emissions.result', [
            'result' => $result,
            'input' => $validated,
            'emission' => $emission
        ]);
    }
} 