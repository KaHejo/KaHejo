<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\CarbonFootprintController;
use App\Http\Controllers\RewardController;
use App\Http\Controllers\Admin\PointRuleController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CalculatorRuleController; // <- pastikan ada controller ini

// Landing page
Route::get('/', function () {
    return view('welcome');
});

// Carbon Calculator
Route::get('/carbon', [CarbonFootprintController::class, 'index'])->name('carbon');
Route::post('/carbon/calculate', [CarbonFootprintController::class, 'calculate']);

// Main pages
Route::get('/main', [MainController::class, 'index'])->name('main');
Route::get('/profile', [MainController::class, 'profile'])->name('profile');
Route::get('/settings', [MainController::class, 'settings'])->name('settings');

// Admin Routes
Route::prefix('admin')->name('admin.')->group(function () {
    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Point Rules Management
    Route::get('/point-rules', [PointRuleController::class, 'index'])->name('point-rules.index');
    Route::get('/point-rules/create', [PointRuleController::class, 'create'])->name('point-rules.create');
    Route::post('/point-rules', [PointRuleController::class, 'store'])->name('point-rules.store');
    Route::get('/point-rules/{pointRule}/edit', [PointRuleController::class, 'edit'])->name('point-rules.edit');
    Route::put('/point-rules/{pointRule}', [PointRuleController::class, 'update'])->name('point-rules.update');
    Route::delete('/point-rules/{pointRule}', [PointRuleController::class, 'destroy'])->name('point-rules.destroy');
    Route::post('/point-rules/test', [PointRuleController::class, 'testRule'])->name('point-rules.test');

    // Emission Calculator Rules Management
    Route::get('/calculator-rules', [CalculatorRuleController::class, 'index'])->name('calculator-rules.index');


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

    // Admin Rewards routes

});
