<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Achievement;
use App\Models\HistoryClaim;
use App\Models\Reward;
use Illuminate\Http\Request;

class AchievementRewardController extends Controller
{
    /**
     * Get all achievements and the current user's unlock status.
     */
    public function achievements(Request $request)
    {
        $user = $request->user();
        $allAchievements = Achievement::all();
        $unlockedIds = $user->achievements()->pluck('achievements.id')->toArray();

        $data = $allAchievements->map(function ($ach) use ($unlockedIds) {
            return [
                'id' => $ach->id,
                'title' => $ach->title,
                'description' => $ach->description,
                'points_awarded' => $ach->points_awarded ?? $ach->points ?? 0,
                'is_unlocked' => in_array($ach->id, $unlockedIds),
                'badge_icon' => $ach->badge_icon ?? 'fa-medal',
            ];
        });

        $totalEarnedPoints = $user->achievements()->sum('points_awarded');

        return response()->json([
            'success' => true,
            'message' => 'Daftar prestasi (achievements) berhasil dimuat.',
            'data' => [
                'user_total_points' => $user->points ?? $totalEarnedPoints,
                'total_achievements' => $allAchievements->count(),
                'unlocked_count' => count($unlockedIds),
                'achievements' => $data,
            ],
        ]);
    }

    /**
     * Get catalog of available rewards.
     */
    public function rewards(Request $request)
    {
        $rewards = Reward::all()->map(function ($r) {
            return [
                'id' => $r->id,
                'name' => $r->name,
                'description' => $r->description,
                'points_required' => $r->points_required,
                'stock' => $r->stock,
                'image_url' => $r->image ? asset('storage/' . $r->image) : null,
                'is_available' => $r->stock > 0,
            ];
        });

        return response()->json([
            'success' => true,
            'message' => 'Katalog rewards berhasil dimuat.',
            'data' => $rewards,
        ]);
    }

    /**
     * Get specific reward details.
     */
    public function rewardDetail(Request $request, $id)
    {
        $reward = Reward::findOrFail($id);

        return response()->json([
            'success' => true,
            'message' => 'Detail reward berhasil dimuat.',
            'data' => [
                'id' => $reward->id,
                'name' => $reward->name,
                'description' => $reward->description,
                'points_required' => $reward->points_required,
                'stock' => $reward->stock,
                'image_url' => $reward->image ? asset('storage/' . $reward->image) : null,
                'is_available' => $reward->stock > 0,
            ],
        ]);
    }

    /**
     * Redeem a reward using user points.
     */
    public function redeemReward(Request $request, $id)
    {
        $user = $request->user();
        $reward = Reward::findOrFail($id);

        if ($reward->stock < 1) {
            return response()->json([
                'success' => false,
                'message' => 'Stok hadiah ini sudah habis.',
            ], 400);
        }

        $userPoints = $user->points ?? 0;
        if ($userPoints < $reward->points_required) {
            return response()->json([
                'success' => false,
                'message' => 'Poin Anda tidak mencukupi untuk menukarkan hadiah ini.',
                'data' => [
                    'current_points' => $userPoints,
                    'required_points' => $reward->points_required,
                ],
            ], 400);
        }

        // Deduct stock and points
        $reward->decrement('stock');
        $user->decrement('points', $reward->points_required);

        // Record history claim
        $claim = HistoryClaim::create([
            'user_id' => $user->id,
            'reward_id' => $reward->id,
            'points_used' => $reward->points_required,
            'status' => 'pending',
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Klaim hadiah berhasil! Silakan cek riwayat penukaran Anda.',
            'data' => [
                'claim_id' => $claim->id,
                'reward_name' => $reward->name,
                'points_deducted' => $reward->points_required,
                'remaining_points' => $user->points,
                'status' => 'pending',
                'claimed_at' => $claim->created_at,
            ],
        ]);
    }

    /**
     * Get user reward claim history.
     */
    public function historyClaims(Request $request)
    {
        $claims = HistoryClaim::where('user_id', $request->user()->id)
            ->with('reward')
            ->orderBy('created_at', 'desc')
            ->get()
            ->map(function ($c) {
                return [
                    'id' => $c->id,
                    'reward_name' => $c->reward ? $c->reward->name : 'Reward',
                    'points_used' => $c->points_used,
                    'status' => $c->status,
                    'claimed_at' => $c->created_at->format('d M Y, H:i'),
                ];
            });

        return response()->json([
            'success' => true,
            'message' => 'Riwayat penukaran hadiah berhasil dimuat.',
            'data' => $claims,
        ]);
    }
}
