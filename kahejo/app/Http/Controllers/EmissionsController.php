<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\EmissionsService;

class EmissionsController extends Controller
{
    public function index()
    {
        return view('emissions.form');
    }

    public function store(Request $request, EmissionsService $service)
    {
        $validated = $request->validate([
            'source_type' => 'required|string',
            'consumption_amount' => 'required|numeric',
            'unit' => 'required|string',
            'emission_factor' => 'required|numeric',
            'emission_type' => 'required|string',
            'emission_date' => 'required|date',
            'location' => 'required|string',
        ]);

        $result = $service->calculateEmissions(
            $validated['source_type'],
            $validated['consumption_amount'],
            $validated['unit'],
            $validated['emission_factor'],
            $validated['emission_type'],
            $validated['emission_date'],
            $validated['location']
        );

        return view('emissions.result', [
            'result' => $result,
            'input' => $validated
        ]);
    }
} 