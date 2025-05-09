<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CarbonFootprint;

class CarbonFootprintController extends Controller
{
    public function index()
    {
        return view('carbon.index');
    }

    public function calculate(Request $request)
    {
        $validated = $request->validate([
            'electricity' => 'required|numeric',
            'transportation' => 'required|numeric',
            'waste' => 'required|numeric',
            'water' => 'required|numeric',
        ]);

        // Calculate carbon footprint
        $results = [
            'electricity' => $validated['electricity'] * 0.5, // 0.5 kg CO2 per kWh
            'transportation' => $validated['transportation'] * 0.2, // 0.2 kg CO2 per km
            'waste' => $validated['waste'] * 2.5, // 2.5 kg CO2 per kg of waste
            'water' => $validated['water'] * 0.3, // 0.3 kg CO2 per m3 of water
        ];

        // Calculate total
        $results['total'] = array_sum($results);

        // Save to database
        CarbonFootprint::create([
            'user_id' => auth()->id(), // Will be null if not authenticated
            'electricity' => $results['electricity'],
            'transportation' => $results['transportation'],
            'waste' => $results['waste'],
            'water' => $results['water'],
            'total' => $results['total']
        ]);

        return view('carbon.index', compact('results'));
    }
}
