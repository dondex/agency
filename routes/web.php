<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;





Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/', [App\Http\Controllers\Frontend\FrontendController::class, 'index']);
Route::get('jobs/{country_slug}', [App\Http\Controllers\Frontend\FrontendController::class, 'viewCountryJob']);
Route::get('jobs/{country_slug}/{job_slug}', [App\Http\Controllers\Frontend\FrontendController::class, 'viewJob']);

Route::get('/about', function () {
    return view('frontend.page.about');
});

Route::get('/services', function () {
    return view('frontend.page.services');
});


Route::get('/contact', [App\Http\Controllers\ContactController::class, 'index']);
Route::post('/send', [App\Http\Controllers\ContactController::class, 'send'])->name('send');

Route::get('/news', [App\Http\Controllers\Frontend\FrontendController::class, 'viewNews']);
Route::get('/news/{news_slug}', [App\Http\Controllers\Frontend\FrontendController::class, 'viewSingleNews']);

Route::prefix('applicant')->middleware(['auth'])->group(function () {
    Route::get('apply-job', [App\Http\Controllers\ApplicantController::class, 'create']);
    Route::post('apply-job', [App\Http\Controllers\ApplicantController::class, 'store']);

    Route::get('apply-job/{job_name}', [App\Http\Controllers\ApplicantController::class, 'applyJob']);
    Route::post('apply-job/{job_name}', [App\Http\Controllers\ApplicantController::class, 'applyJobStore']);
});



Route::prefix('admin')->middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index']);

    Route::get('applicants', [App\Http\Controllers\ApplicantController::class, 'index']);
    Route::get('add-applicant', [App\Http\Controllers\ApplicantController::class, 'createApplicant']);
    Route::post('add-applicant', [App\Http\Controllers\ApplicantController::class, 'storeApplicant']);
    Route::get('show-applicant/{applicant_id}', [App\Http\Controllers\ApplicantController::class, 'show']);
    Route::get('edit-applicant/{applicant_id}', [App\Http\Controllers\ApplicantController::class, 'edit']);
    Route::put('update-applicant/{applicant_id}', [App\Http\Controllers\ApplicantController::class, 'update']);
    Route::get('delete-applicant/{applicant_id}', [App\Http\Controllers\ApplicantController::class, 'destroy']);

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
