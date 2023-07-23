<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::prefix('admin')->middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index']);

    Route::get('country', [App\Http\Controllers\Admin\CountryController::class, 'index']);
    Route::get('add-country', [App\Http\Controllers\Admin\CountryController::class, 'create']);
    Route::post('add-country', [App\Http\Controllers\Admin\CountryController::class, 'store']);
    Route::get('edit-country/{country_id}', [App\Http\Controllers\Admin\CountryController::class, 'edit']);
    Route::put('update-country/{country_id}', [App\Http\Controllers\Admin\CountryController::class, 'update']);
    Route::get('delete-country/{country_id}', [App\Http\Controllers\Admin\CountryController::class, 'destroy']);
});
