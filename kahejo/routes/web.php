<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CompanyEnergyController;
use App\Http\Controllers\CarbonFootprintController;
use App\Http\Controllers\EmissionsFactorController;

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

});
// Routes untuk faktor emisi - dapat diakses tanpa login

require __DIR__.'/admin-auth.php';
