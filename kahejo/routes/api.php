<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\DashboardController;
use App\Http\Controllers\Api\CarbonController;
use App\Http\Controllers\Api\EnergyController;
use App\Http\Controllers\Api\AchievementRewardController;
use App\Http\Controllers\Api\EducationController;
use App\Http\Controllers\Api\FaqController;
use App\Http\Controllers\Api\ProfileController;
use App\Http\Controllers\Api\EmissionFactorController;

/*
|--------------------------------------------------------------------------
| KaHejo REST API Routes
|--------------------------------------------------------------------------
| All routes are prefixed with '/api' by Laravel routing bootstrap.
*/

// ==========================================
// 1. PUBLIC ROUTES (No Auth Required)
// ==========================================
Route::prefix('auth')->group(function () {
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/login', [AuthController::class, 'login']);
});

// Public Education Articles, FAQs, & Emission Factors
Route::get('/education/articles', [EducationController::class, 'articles']);
Route::get('/education/articles/{slug}', [EducationController::class, 'show']);
Route::get('/faqs', [FaqController::class, 'index']);
Route::get('/emission-factors', [EmissionFactorController::class, 'index']);

// ==========================================
// 2. PROTECTED ROUTES (Sanctum Token Required)
// ==========================================
Route::middleware('auth:sanctum')->group(function () {
    
    // Auth & Account
    Route::prefix('auth')->group(function () {
        Route::post('/logout', [AuthController::class, 'logout']);
        Route::get('/me', [AuthController::class, 'me']);
    });

    // Profile & Settings
    Route::prefix('profile')->group(function () {
        Route::get('/', [ProfileController::class, 'show']);
        Route::put('/', [ProfileController::class, 'update']);
        Route::post('/photo', [ProfileController::class, 'updatePhoto']);
        Route::put('/password', [ProfileController::class, 'updatePassword']);
    });
    Route::prefix('settings')->group(function () {
        Route::get('/', [ProfileController::class, 'getSettings']);
        Route::put('/', [ProfileController::class, 'updateSettings']);
    });

    // Dashboard & Metrics
    Route::prefix('dashboard')->group(function () {
        Route::get('/overview', [DashboardController::class, 'overview']);
        Route::get('/carbon-trend', [DashboardController::class, 'carbonTrend']);
        Route::get('/energy-analysis', [DashboardController::class, 'energyAnalysis']);
    });

    // Carbon Footprint Calculator
    Route::prefix('carbon')->group(function () {
        Route::post('/calculate', [CarbonController::class, 'calculate']);
        Route::get('/history', [CarbonController::class, 'history']);
        Route::get('/{id}', [CarbonController::class, 'show']);
    });

    // Company Energy Consumption
    Route::prefix('energy')->group(function () {
        Route::post('/', [EnergyController::class, 'store']);
        Route::get('/history', [EnergyController::class, 'history']);
        Route::get('/{id}', [EnergyController::class, 'show']);
    });

    // Achievements & Gamification
    Route::get('/achievements', [AchievementRewardController::class, 'achievements']);

    // Rewards & Redemptions
    Route::prefix('rewards')->group(function () {
        Route::get('/', [AchievementRewardController::class, 'rewards']);
        Route::get('/{id}', [AchievementRewardController::class, 'rewardDetail']);
        Route::post('/{id}/redeem', [AchievementRewardController::class, 'redeemReward']);
    });
    Route::get('/history-claims', [AchievementRewardController::class, 'historyClaims']);

    // Education Article Creation (Protected)
    Route::post('/education/articles', [EducationController::class, 'store']);
});
