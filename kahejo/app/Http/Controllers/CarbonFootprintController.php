<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\CarbonFootprintService;

class CarbonFootprintController extends Controller
{
    public function index()
    {
        return view('carbon.index');
    }

    public function calculate(Request $request, CarbonFootprintService $service)
    {
        $validated = $request->validate([
            'electricity_kwh' => 'required|numeric',
            'fuel_liters' => 'required|numeric',
            'waste_kg' => 'required|numeric',
        ]);

        $result = $service->calculateFootprint(
            $validated['electricity_kwh'],
            $validated['fuel_liters'],
            $validated['waste_kg']
        );

        return view('carbon.index', [
            'result' => $result,
            'input' => $validated
        ]);
    }
}
