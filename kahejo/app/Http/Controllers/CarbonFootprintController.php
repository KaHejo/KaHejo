<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CarbonFootprint;
use Illuminate\Support\Facades\DB;

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

        // Ambil faktor emisi dari database
        $factors = DB::table('emission_factors')
            ->whereIn('category', ['Listrik', 'Bensin', 'Limbah', 'Air'])
            ->pluck('value', 'category');

        // Calculate carbon footprint
        $results = [
            'electricity' => $validated['electricity'] * ($factors['Listrik'] ?? 0.5), // 0.5 kg CO2 per kWh
            'transportation' => $validated['transportation'] * ($factors['Bensin'] ?? 0.2), // 0.2 kg CO2 per km
            'waste' => $validated['waste'] * ($factors['Limbah'] ?? 2.5), // 2.5 kg CO2 per kg of waste
            'water' => $validated['water'] * ($factors['Air'] ?? 0.3), // 0.3 kg CO2 per m3 of water
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

    public function view($id)
    {
        try {
            $carbon = CarbonFootprint::findOrFail($id);
            return view('carbon.view', compact('carbon'));
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return redirect()->route('carbon')->with('error', 'Carbon footprint record not found.');
        }
    }

    public function history()
    {
        $carbonFootprints = CarbonFootprint::where('user_id', auth()->id())
            ->orderBy('created_at', 'desc')
            ->paginate(10);
            
        return view('carbon.history', compact('carbonFootprints'));
    }
}
