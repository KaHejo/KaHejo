<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarbonFootprintController; 
use App\Http\Controllers\MainContorller;
use App\Http\Controllers\EmissionsController;

// Carbon Footprint Routes
Route::get('/carbon', [CarbonFootprintController::class, 'index'])->name('carbon.index');
Route::post('/carbon/calculate', [CarbonFootprintController::class, 'calculate'])->name('carbon.calculate');

// Emissions Form Routes
Route::get('/emissions', [EmissionsController::class, 'index'])->name('emissions.form');
Route::post('/emissions/result', [EmissionsController::class, 'store'])->name('emissions.result');

// Welcome Route 
Route::get('/carbon', [CarbonFootprintController::class, 'index'])->name('carbon');
Route::post('/carbon/calculate', [CarbonFootprintController::class, 'calculate']);

// Route::middleware(['auth'])->group(function () {
//     Route::get('/main', [MainController::class, 'index'])->name('main');
//     Route::get('/profile', [MainController::class, 'profile'])->name('profile');
//     Route::get('/settings', [MainController::class, 'settings'])->name('settings');
// });

    Route::get('/main', [MainController::class, 'index'])->name('main');
    Route::get('/profile', [MainController::class, 'profile'])->name('profile');
    Route::get('/settings', [MainController::class, 'settings'])->name('settings');

    Route::get('/', function () {
    return view('welcome');
}); 