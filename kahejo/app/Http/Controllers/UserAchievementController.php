<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Achievement;
use App\Models\UserAchievement;

class UserAchievementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userAchievements = UserAchievement::with(['user', 'achievement'])->paginate(5);
        return view('Admin.user_achievements.index', compact('userAchievements'));
    }
}
