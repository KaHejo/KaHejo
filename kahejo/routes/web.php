<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarbonFootprintController;

Route::get('/carbon', [CarbonFootprintController::class, 'index']);
Route::post('/carbon/calculate', [CarbonFootprintController::class, 'calculate']);

Route::get('/', function () {
    return view('welcome');
});
