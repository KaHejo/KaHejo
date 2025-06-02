<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarbonFootprintController; 
use App\Http\Controllers\MainController;
use App\Http\Controllers\EmissionsFactorController;
use App\Http\Controllers\CompanyEnergyController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\RewardController;
use App\Http\Controllers\AchievementController;
use App\Http\Controllers\UserAchievementController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HistoryClaimController;


// Welcome Route
Route::get('/', function () {
    return view('welcome');
});

Route::get('/clear-session', function () {
    Auth::guard('web')->logout();
    Auth::guard('admin')->logout();
    session()->flush();
    return redirect('/admin/login');
});

// Authentication Routes
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Protected Routes
Route::middleware(['auth'])->group(function () {
    // Main Routes
    Route::get('/main', [MainController::class, 'index'])->name('dashboard');
    Route::get('/profile', [MainController::class, 'profile'])->name('profile');
    Route::put('/profile', [MainController::class, 'updateProfile'])->name('profile.update');
    Route::put('/profile/password', [MainController::class, 'updatePassword'])->name('password.update');
    Route::get('/settings', [MainController::class, 'settings'])->name('settings');

    // // Admin Routes
    // Route::get('/admin', [AdminController::class, 'index'])->name('admin');

    // Carbon Footprint Routes
    Route::get('/carbon', [CarbonFootprintController::class, 'index'])->name('carbon');
    Route::post('/carbon/calculate', [CarbonFootprintController::class, 'calculate'])->name('carbon.calculate');
    Route::get('/carbon/history', [CarbonFootprintController::class, 'history'])->name('carbon.history');
    Route::get('/carbon/{id}', [CarbonFootprintController::class, 'view'])->name('carbon.view');

    // Emissions Routes
    Route::get('/emissions', [EmissionsController::class, 'index'])->name('emissions');
    Route::post('/emissions', [EmissionsController::class, 'store'])->name('emissions.store');

    // Company Energy Consumption Routes
    Route::get('/company', [CompanyEnergyController::class, 'index'])->name('company');
    Route::post('/company', [CompanyEnergyController::class, 'store'])->name('company.result');
    Route::get('/company/history', [CompanyEnergyController::class, 'history'])->name('company.history');
   Route::get('/company/view/{id}', [CompanyEnergyController::class, 'view'])->name('company.view');

    
    // achievements
    Route::get('/achievements', [AchievementController::class, 'main'])->name('achievements');

    // Rewards
    Route::get('/rewards', [RewardController::class, 'main'])->name('rewards');
    Route::get('/rewards/{id}', [RewardController::class, 'show'])->name('rewards.show');
    Route::post('/rewards/{id}/redeem', [RewardController::class, 'redeem'])->name('rewards.redeem');
}); 

// Admin Routes
Route::prefix('admin')->name('admin.')->group(function () {
    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    // Users Management
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::prefix('rewards')->group(function () {
        // Route untuk menampilkan semua reward (index)
        Route::get('/', [RewardController::class, 'index'])->name('rewards.index');

        // Route untuk halaman form untuk menambah reward baru
        Route::get('/create', [RewardController::class, 'create'])->name('rewards.create');

        // Route untuk menyimpan reward baru
        Route::post('/', [RewardController::class, 'store'])->name('rewards.store');

        // Route untuk menampilkan halaman edit reward
        Route::get('{id}/edit', [RewardController::class, 'edit'])->name('rewards.edit');

        // Route untuk memperbarui data reward
        Route::put('/{id}', [RewardController::class, 'update'])->name('rewards.update');

        // Route untuk menghapus reward
        Route::delete('/{id}', [RewardController::class, 'destroy'])->name('rewards.destroy');
    });

    // Achievement Management
    Route::prefix('achievements')->group(function () {
        Route::get('/', [AchievementController::class, 'index'])->name('achievements.index');
        Route::get('/create', [AchievementController::class, 'create'])->name('achievements.create');
        Route::post('/', [AchievementController::class, 'store'])->name('achievements.store');
        Route::get('{id}/edit', [AchievementController::class, 'edit'])->name('achievements.edit');
        Route::put('/{id}', [AchievementController::class, 'update'])->name('achievements.update');
        Route::delete('/{id}', [AchievementController::class, 'destroy'])->name('achievements.destroy');
    });

    // User Achievements Management 
    Route::get('/user-achievements', [UserAchievementController::class, 'index'])->name('user-achievements.index');

    // History Claims Management
    Route::get('/history-claims', [HistoryClaimController::class, 'index'])->name('history-claims.index');
});


// Routes untuk faktor emisi - dapat diakses tanpa login

require __DIR__.'/admin-auth.php';
