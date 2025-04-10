<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarbonFootprintController;
use App\Http\Controllers\MainController;

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
