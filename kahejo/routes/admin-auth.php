<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminKYCController;
use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\SupportMessageController;
use App\Http\Controllers\LoanCalculatorController;

// Login As Admin Tidak Perlu Login
Route::prefix('admin')->middleware('guest:admin')->group(function () {
    // Login
    Route::get('login', [LoginController::class, 'create'])->name('admin.login');
    Route::post('login', [LoginController::class, 'store']);
});

Route::prefix('admin')->middleware('auth:admin')->group(function () {
    // Dashboard Admin
    Route::get('/admin-dashboard', [AdminController::class, 'dashboard'])->name('admin.index');
});
