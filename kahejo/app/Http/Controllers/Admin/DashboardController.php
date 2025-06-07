<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Achievement;
use App\Models\EmissionFactor;
use App\Models\HistoryClaim;
use App\Models\Reward;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        //count semua table yang ada di dashboard admin
        $usersCount = User::count();
        //achievement count
        $achievementsCount = Achievement::count();
        //emisi count
        $emisiCount = EmissionFactor::count();
        //history claims count
        $historyClaimsCount = HistoryClaim::count();
        //reward count
        $rewardsCount = Reward::count();
        //total points dari semua user
        $totalPoints = User::sum('points');



        // Data untuk grafik total history claim per bulan
        $historyClaimData = \App\Models\HistoryClaim::selectRaw("DATE_FORMAT(created_at, '%Y-%m') as month, COUNT(*) as total")
            ->groupBy('month')
            ->orderBy('month')
            ->get();

        $historyClaimMonths = $historyClaimData->pluck('month');
        $historyClaimCounts = $historyClaimData->pluck('total');

        return view('Admin.dashboard',
            compact(
                'usersCount',
                'achievementsCount',
                'emisiCount',
                'historyClaimsCount',
                'rewardsCount',
                'totalPoints',
                'historyClaimMonths',
                'historyClaimCounts'
            )
        );
    }
}
