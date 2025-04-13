<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarbonFootprintController;
use App\Http\Controllers\EmissionsController;

// Carbon Footprint Routes
Route::get('/carbon', [CarbonFootprintController::class, 'index'])->name('carbon.index');
Route::post('/carbon/calculate', [CarbonFootprintController::class, 'calculate'])->name('carbon.calculate');

// Emissions Form Routes
Route::get('/emissions', [EmissionsController::class, 'index'])->name('emissions.form');
Route::post('/emissions/result', [EmissionsController::class, 'store'])->name('emissions.result');

// Welcome Route
Route::get('/', function () {
    return view('welcome');
}); 