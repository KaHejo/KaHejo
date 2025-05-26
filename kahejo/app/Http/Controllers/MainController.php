<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\CarbonFootprint;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

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
        $user = Auth::user();
        return view('profile', compact('user'));
    }

    public function updateProfile(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . Auth::id(),
            'phone' => 'nullable|string|max:20',
            'birth_date' => 'nullable|date',
            'gender' => 'nullable|in:male,female,other',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'company' => 'nullable|string|max:255',
            'profile_photo_path' => 'nullable|string|max:255',
        ]);

        $user = Auth::user();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->birth_date = $request->birth_date;
        $user->gender = $request->gender;
        $user->company = $request->company;

        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('profile-photos', 'public');
            $user->profile_photo_path = $path;
        }

        $user->save();

        return redirect()->route('profile')->with('success', 'Profile updated successfully!');
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required|current_password',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = Auth::user();
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()->route('profile')->with('success', 'Password updated successfully!');
    }

    public function settings()
    {
        return view('settings');
    }
} 