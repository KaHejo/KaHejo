<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Routes untuk faktor emisi - dapat diakses tanpa login
Route::resource('emission-factors', App\Http\Controllers\EmissionFactorController::class);
