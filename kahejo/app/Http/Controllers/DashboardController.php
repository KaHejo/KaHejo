<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CarbonEmission;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $userId = Auth::id(); // Get currently logged-in user ID

        // 1. Total emissions
        $totalEmission = CarbonEmission::where('user_id', $userId)->sum('amount');

        // 2. Emissions grouped by category (e.g., transportation, electricity)
        $emissionsByCategory = CarbonEmission::where('user_id', $userId)
            ->selectRaw('category, SUM(amount) as total')
            ->groupBy('category')
            ->pluck('total', 'category');

        // 3. Monthly emissions (for the chart)
        $monthlyEmissions = CarbonEmission::where('user_id', $userId)
            ->selectRaw('DATE_FORMAT(date, "%Y-%m") as month, SUM(amount) as total')
            ->groupBy('month')
            ->orderBy('month')
            ->pluck('total', 'month');

        // Return to the Blade view with data
        return view('dashboard.index', compact('totalEmission', 'emissionsByCategory', 'monthlyEmissions'));
    }
}