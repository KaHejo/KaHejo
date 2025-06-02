<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reward;
use App\Models\HistoryClaim;
use Illuminate\Support\Facades\Auth;

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

    public function main()
    {
        $rewards = Reward::all();
        return view('rewards.index', compact('rewards'));
    }

    public function redeem(Request $request, $id)
    {
        $user = Auth::user();
        $reward = Reward::findOrFail($id);

        // Pastikan user dan reward valid
        if (!$user || !$reward) {
            return redirect()->back()->with('error', 'User atau reward tidak ditemukan.');
        }

        // Cek stock dan poin user
        $userPoints = $user->achievements ? $user->achievements->sum('points_awarded') : 0;
        if ($reward->stock < 1) {
            return redirect()->back()->with('error', 'Stock reward habis.');
        }
        if ($userPoints < $reward->points_required) {
            return redirect()->back()->with('error', 'Poin kamu tidak cukup untuk menukar reward ini.');
        }

        // Kurangi stock reward
        $reward->stock -= 1;
        $reward->save();

        // Kurangi poin user (misal field points di tabel users)
        // Jika tidak ada field points, update sesuai kebutuhan aplikasi Anda
        if (isset($user->points)) {
            $user->points -= $reward->points_required;
            $user->save();
        }

        // Simpan ke history_claims
        HistoryClaim::create([
            'user_id' => $user->id,
            'reward_id' => $reward->id,
        ]);

        return redirect()->back()->with('success', 'Reward berhasil diredeem!');
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
            'stock' => 'required|integer|min:0',
            'reward_image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $imageExtension = $request->reward_image->extension(); // Ambil ekstensi file  
        $imageName = 'Image' . '' . $validatedData['reward_name'] . '.' . $imageExtension; 
        $request->reward_image->move(public_path('images'), $imageName);

        Reward::create([
            'reward_name' => $request->input('reward_name'),
            'reward_description' => $request->input('reward_description'),
            'points_required' => $request->input('points_required'),
            'stock' => $request->input('stock'),
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

        $validatedData = $request->validate([
            'reward_name' => 'required|string|max:255',
            'reward_description' => 'nullable|string',
            'points_required' => 'required|integer|min:1',
            'stock' => 'required|integer|min:0',
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
        $rewards->delete();  

        return redirect()->route('admin.rewards.index')->with('success', 'Reward berhasil dihapus');
    }
}
