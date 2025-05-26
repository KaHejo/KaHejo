<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reward;

class RewardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rewards = Reward::paginate(5);
        return view('Admin.rewards.index', compact('rewards'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Admin.rewards.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'reward_name' => 'required|string|max:255',
            'reward_description' => 'nullable|string',
            'points_required' => 'required|integer|min:1',
            'reward_image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $imageExtension = $request->reward_image->extension(); // Ambil ekstensi file  
        $imageName = 'Image' . '' . $validatedData['reward_name'] . '.' . $imageExtension; // Ganti nama file dengan nama UKM dan nama kegiatan
        $request->reward_image->move(public_path('images'), $imageName);

        Reward::create([
            'reward_name' => $request->input('reward_name'),
            'reward_description' => $request->input('reward_description'),
            'points_required' => $request->input('points_required'),
            'reward_image' => 'images/'.$imageName, // Menyimpan path gambar jika ada 
        ]);


        return redirect()->route('admin.rewards.index')->with('success', 'Rewards berhasil ditambahkan');


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
        $reward = Reward::findorFail($id);
        return view('Admin.rewards.edit', compact('reward'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $reward = Reward::findOrFail($id);

        $validated = $request->validate([
            'reward_name' => 'required|string|max:255',
            'reward_description' => 'nullable|string',
            'points_required' => 'required|integer|min:1',
            'reward_image' => 'required|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        // Cek apakah ada logo baru yang diunggah  
        if ($request->hasFile('reward_image')) {  
            // Hapus logo lama jika ada  
            if ($reward->reward_image) {  
                $oldLogoPath = public_path($reward->reward_image);  
                if (file_exists($oldLogoPath)) {  
                    unlink($oldLogoPath); // Hapus file logo lama  
                }  
            } 

            $imageExtension = $request->reward_image->extension(); // Ambil ekstensi file  
            $imageName = 'Image' . '' . $validatedData['reward_name'] . '.' . $imageExtension; // Ganti nama file dengan nama UKM dan nama kegiatan
            $request->reward_image->move(public_path('images'), $imageName);

            // Update data UKM dengan logo baru  
            $validatedData['reward_image'] = 'images/' . $imageName; // Simpan path logo baru  
        } else {  
            // Jika tidak ada logo baru, tetap gunakan logo lama  
            $validatedData['reward_image'] = $reward->reward_image;  
        }  
        $reward->update($validatedData);

        return redirect()->route('admin.rewards.index')->with('success', 'Reward berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $rewards = Reward::findOrFail($id);  
    
        // Hapus file logo jika ada  
        if ($rewards->reward_image) {  
            $logoPath = public_path($rewards->reward_image);  
            if (file_exists($logoPath)) {  
                unlink($logoPath); // Hapus file logo dari sistem file  
            }  
        }  
    
        // Hapus UKM dari database  
        $rewards->delete();  

        return redirect()->route('admin.rewards.index')->with('success', 'Reward berhasil dihapus');
    }
}
