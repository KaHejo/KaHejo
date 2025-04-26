<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarbonFootprintController; 
use App\Http\Controllers\MainController;
use App\Http\Controllers\EmissionsController;
use App\Http\Controllers\CompanyEnergyController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;

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
}); 