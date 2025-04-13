<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarbonFootprintController; 
use App\Http\Controllers\MainController;
use App\Http\Controllers\EmissionsController;

// Carbon Footprint Routes
Route::get('/carbon', [CarbonFootprintController::class, 'index'])->name('carbon');
Route::post('/carbon/calculate', [CarbonFootprintController::class, 'calculate'])->name('carbon.calculate');

// Emissions Routes
Route::get('/emissions', [EmissionsController::class, 'index'])->name('emissions');
Route::post('/emissions', [EmissionsController::class, 'store'])->name('emissions.store');

// Main Routes
Route::get('/main', [MainController::class, 'index'])->name('main');
Route::get('/profile', [MainController::class, 'profile'])->name('profile');
Route::get('/settings', [MainController::class, 'settings'])->name('settings');

// Welcome Route
Route::get('/', function () {
    return view('welcome');
});

// Route::middleware(['auth'])->group(function () {
//     Route::get('/main', [MainController::class, 'index'])->name('main');
//     Route::get('/profile', [MainController::class, 'profile'])->name('profile');
//     Route::get('/settings', [MainController::class, 'settings'])->name('settings');
// }); 