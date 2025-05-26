<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Achievement;

class AchievementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $achievements = Achievement::paginate(5);
        return view('Admin.achievements.index', compact('achievements'));
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Admin.achievements.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:1000',
            'icon' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'category' => 'nullable|string|max:255',
            'points' => 'required|integer|min:0',
        ]);

        $imageExtension = $request->icon->extension(); // Ambil ekstensi file
        $imageName = 'Image' . '' . $validated['name'] . '.' . $imageExtension;
        $request->icon->move(public_path('images'), $imageName);

        Achievement::create(array_merge($validated, ['icon' => 'images/' . $imageName]));

        return redirect()->route('admin.achievements.index')->with('success', 'Achievement created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $achievement = Achievement::findOrFail($id);
        return view('Admin.achievements.edit', compact('achievement'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $achievement = Achievement::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:1000',
            'icon' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'category' => 'nullable|string|max:255',
            'points' => 'required|integer|min:0',
        ]);

        if ($request->hasFile('icon')) {
            $imageExtension = $request->icon->extension(); // Ambil ekstensi file
            $imageName = 'Image' . '' . $validated['name'] . '.' . $imageExtension;
            $request->icon->move(public_path('images'), $imageName);
            $validated['icon'] = 'images/' . $imageName;
        }

        $achievement->update($validated);

        return redirect()->route('admin.achievements.index')->with('success', 'Achievement updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $achievement = Achievement::findOrFail($id);
        $achievement->delete();

        return redirect()->route('admin.achievements.index')->with('success', 'Achievement deleted successfully.');
    }
}
