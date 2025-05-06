<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Routes untuk faktor emisi - dapat diakses tanpa login
Route::resource('emission-factors', App\Http\Controllers\EmissionFactorController::class);

// Routes untuk admin FAQ (tanpa autentikasi)
Route::prefix('admin/faqs')->name('admin.faqs.')->group(function () {
    Route::get('/', 'App\Http\Controllers\Admin\FaqController@index')->name('index');
    Route::get('/create', 'App\Http\Controllers\Admin\FaqController@create')->name('create');
    Route::post('/', 'App\Http\Controllers\Admin\FaqController@store')->name('store');
    Route::get('/{faq}/edit', 'App\Http\Controllers\Admin\FaqController@edit')->name('edit');
    Route::put('/{faq}', 'App\Http\Controllers\Admin\FaqController@update')->name('update');
    Route::delete('/{faq}', 'App\Http\Controllers\Admin\FaqController@destroy')->name('delete');
});

// Route untuk user melihat FAQ
Route::get('/faqs', 'App\Http\Controllers\FaqController@index')->name('faqs.index');