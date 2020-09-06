<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Company\HomeController as CompanyHomeController;
use App\Http\Controllers\Professional\HomeController as ProfessionalHomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

/**
 * Common authentication routes
 */
Route::view('/login', 'login');
Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::view('/register', 'register');
Route::post('/register', [AuthController::class, 'register'])->name('register');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

/**
 * Company application routes
 */
Route::group(['prefix' => 'c'], function () {
    Route::get('home', [CompanyHomeController::class, 'index'])->name('company.home');
});

/**
 * Professional application routes
 */
Route::group(['prefix' => 'p'], function () {
    Route::get('home', [ProfessionalHomeController::class, 'index'])->name('professional.home');
});
