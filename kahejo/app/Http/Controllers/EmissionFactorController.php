<?php

namespace App\Http\Controllers;

use App\Models\EmissionFactor;
use Illuminate\Http\Request;

class EmissionFactorController extends Controller
{
    public function index()
    {
        $factors = EmissionFactor::orderBy('category')->get();
        return view('emission-factors.index', compact('factors'));
    }

    public function create()
    {
        return view('emission-factors.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'value' => 'required|numeric',
            'unit' => 'required|string|max:50',
            'description' => 'nullable|string',
            'source' => 'nullable|string|max:255',
        ]);

        EmissionFactor::create($validated);
        return redirect()->route('emission-factors.index')->with('success', 'Faktor emisi berhasil ditambahkan');
    }

    public function edit(EmissionFactor $emissionFactor)
    {
        return view('emission-factors.edit', compact('emissionFactor'));
    }

    public function update(Request $request, EmissionFactor $emissionFactor)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'value' => 'required|numeric',
            'unit' => 'required|string|max:50',
            'description' => 'nullable|string',
            'source' => 'nullable|string|max:255',
        ]);

        $emissionFactor->update($validated);
        return redirect()->route('emission-factors.index')->with('success', 'Faktor emisi berhasil diperbarui');
    }

    public function destroy(EmissionFactor $emissionFactor)
    {
        $emissionFactor->delete();
        return redirect()->route('emission-factors.index')->with('success', 'Faktor emisi berhasil dihapus');
    }
}