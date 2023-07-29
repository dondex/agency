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


    Route::get('jobs', [App\Http\Controllers\Admin\JobController::class, 'index']);
    Route::get('add-jobs', [App\Http\Controllers\Admin\JobController::class, 'create']);
    Route::post('add-jobs', [App\Http\Controllers\Admin\JobController::class, 'store']);
    Route::get('jobs/{job_id}', [App\Http\Controllers\Admin\JobController::class, 'edit']);
    Route::put('update-jobs/{job_id}', [App\Http\Controllers\Admin\JobController::class, 'update']);
    Route::get('delete-jobs/{job_id}', [App\Http\Controllers\Admin\JobController::class, 'destroy']);


    Route::get('news', [App\Http\Controllers\Admin\NewsController::class, 'index']);
    Route::get('add-news', [App\Http\Controllers\Admin\NewsController::class, 'create']);
    Route::post('add-news', [App\Http\Controllers\Admin\NewsController::class, 'store']);
    Route::get('edit-news/{news_id}', [App\Http\Controllers\Admin\NewsController::class, 'edit']);
    Route::put('update-news/{news_id}', [App\Http\Controllers\Admin\NewsController::class, 'update']);
    Route::get('delete-news/{news_id}', [App\Http\Controllers\Admin\NewsController::class, 'destroy']);

    Route::get('users', [App\Http\Controllers\Admin\UserController::class, 'index']);
    Route::get('user/{user_id}', [App\Http\Controllers\Admin\UserController::class, 'edit']);
    Route::put('update-user/{user_id}', [App\Http\Controllers\Admin\UserController::class, 'update']);
});
