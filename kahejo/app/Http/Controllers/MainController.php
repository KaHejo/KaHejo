<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\CarbonFootprint;
use Carbon\Carbon;

class MainController extends Controller
{
    public function __construct()
    {
        // Uncomment this if you want to use authentication
        // $this->middleware('auth');
    }

    public function index()
    {
        // Sample data for dashboard
        $stats = [
            'totalUsers' => 1234,
            'growth' => 24,
            'activeTasks' => 56,
            'completed' => 89
        ];

        // Get carbon footprint history
        $carbonHistory = CarbonFootprint::orderBy('created_at', 'desc')
            ->take(12) // Last 12 months
            ->get()
            ->map(function ($record) {
                return [
                    'date' => Carbon::parse($record->created_at)->format('M Y'),
                    'total' => $record->total,
                    'electricity' => $record->electricity,
                    'transportation' => $record->transportation,
                    'waste' => $record->waste,
                    'water' => $record->water
                ];
            });

        // Recent activities
        $activities = [
            [
                'icon' => 'user-plus',
                'color' => 'green',
                'title' => 'New user registered',
                'time' => '2 hours ago'
            ],
            [
                'icon' => 'tasks',
                'color' => 'blue',
                'title' => 'Task completed',
                'time' => '4 hours ago'
            ],
            [
                'icon' => 'comment',
                'color' => 'yellow',
                'title' => 'New comment',
                'time' => '6 hours ago'
            ]
        ];

        // For now, we'll pass null as user since auth is not implemented yet
        $user = null;

        return view('main', [
            'user' => $user,
            'stats' => $stats,
            'activities' => $activities,
            'carbonHistory' => $carbonHistory
        ]);
    }

    public function profile()
    {
        $user = null; // Will be Auth::user() when auth is implemented
        return view('profile', compact('user'));
    }

    public function settings()
    {
        $user = null; // Will be Auth::user() when auth is implemented
        return view('settings', compact('user'));
    }
} 