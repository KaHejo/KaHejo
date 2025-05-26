<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarbonFootprintController; 
use App\Http\Controllers\MainController;
use App\Http\Controllers\EmissionsFactorController;
use App\Http\Controllers\CompanyEnergyController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\RewardController;

// Welcome Route
Route::get('/', function () {
    return view('welcome');
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
    Route::get('/main', [MainController::class, 'index'])->name('main');
    Route::get('/profile', [MainController::class, 'profile'])->name('profile');
    Route::put('/profile', [MainController::class, 'updateProfile'])->name('profile.update');
    Route::put('/profile/password', [MainController::class, 'updatePassword'])->name('password.update');
    Route::get('/settings', [MainController::class, 'settings'])->name('settings');
    
    // Admin Routes
    Route::get('/admin', [AdminController::class, 'index'])->name('admin');
    
    // Carbon Footprint Routes
    Route::get('/carbon', [CarbonFootprintController::class, 'index'])->name('carbon');
    Route::post('/carbon/calculate', [CarbonFootprintController::class, 'calculate'])->name('carbon.calculate');

    // Emissions Routes
    Route::get('/emissions', [EmissionsController::class, 'index'])->name('emissions');
    Route::post('/emissions', [EmissionsController::class, 'store'])->name('emissions.store');

    // Company Energy Consumption Routes
    Route::get('/company', [CompanyEnergyController::class, 'index'])->name('company');
    Route::post('/company', [CompanyEnergyController::class, 'store'])->name('company.result');
    Route::get('/company/history', [CompanyEnergyController::class, 'history'])->name('company.history');
    
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


// Routes untuk faktor emisi - dapat diakses tanpa login
});