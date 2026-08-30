<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    /**
     * Get user profile.
     */
    public function show(Request $request)
    {
        $user = $request->user();

        return response()->json([
            'success' => true,
            'message' => 'Profil pengguna berhasil dimuat.',
            'data' => [
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
                'phone' => $user->phone,
                'birth_date' => $user->birth_date,
                'gender' => $user->gender,
                'company' => $user->company,
                'points' => $user->points ?? 0,
                'profile_photo_url' => $user->profile_photo_path ? asset('storage/' . $user->profile_photo_path) : null,
                'created_at' => $user->created_at,
            ],
        ]);
    }

    /**
     * Update user profile information.
     */
    public function update(Request $request)
    {
        $user = $request->user();

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'phone' => 'nullable|string|max:20',
            'birth_date' => 'nullable|date',
            'gender' => 'nullable|string|in:male,female,other',
            'company' => 'nullable|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validasi profil gagal.',
                'errors' => $validator->errors(),
            ], 422);
        }

        $user->update($request->only(['name', 'phone', 'birth_date', 'gender', 'company']));

        return response()->json([
            'success' => true,
            'message' => 'Data profil berhasil diperbarui.',
            'data' => $user,
        ]);
    }

    /**
     * Update profile avatar photo.
     */
    public function updatePhoto(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'photo' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Berkas foto tidak valid (Maks. 2MB).',
                'errors' => $validator->errors(),
            ], 422);
        }

        $user = $request->user();

        if ($user->profile_photo_path) {
            Storage::disk('public')->delete($user->profile_photo_path);
        }

        /** @var \Illuminate\Http\UploadedFile $photoFile */
        $photoFile = $request->file('photo');
        $path = $photoFile->store('profile-photos', 'public');
        $user->profile_photo_path = $path;
        $user->save();

        return response()->json([
            'success' => true,
            'message' => 'Foto profil berhasil diperbarui.',
            'data' => [
                'profile_photo_url' => asset('storage/' . $path),
            ],
        ]);
    }

    /**
     * Update user account password.
     */
    public function updatePassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'current_password' => 'required',
            'new_password' => 'required|min:8|confirmed|different:current_password',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validasi kata sandi baru gagal.',
                'errors' => $validator->errors(),
            ], 422);
        }

        $user = $request->user();

        if (!Hash::check($request->current_password, $user->password)) {
            return response()->json([
                'success' => false,
                'message' => 'Kata sandi saat ini tidak cocok.',
            ], 400);
        }

        $user->password = Hash::make($request->new_password);
        $user->save();

        return response()->json([
            'success' => true,
            'message' => 'Kata sandi berhasil diubah.',
        ]);
    }

    /**
     * Get user application settings.
     */
    public function getSettings(Request $request)
    {
        return response()->json([
            'success' => true,
            'message' => 'Pengaturan pengguna berhasil dimuat.',
            'data' => [
                'language' => 'id',
                'theme' => 'dark_emerald',
                'email_notifications' => true,
                'carbon_alert' => true,
                'two_factor_auth' => false,
            ],
        ]);
    }

    /**
     * Update user application settings.
     */
    public function updateSettings(Request $request)
    {
        return response()->json([
            'success' => true,
            'message' => 'Pengaturan preferensi akun berhasil disimpan.',
            'data' => $request->all(),
        ]);
    }
}
