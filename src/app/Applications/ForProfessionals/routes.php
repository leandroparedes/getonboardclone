<?php

/**
 * Authentication routes
 */
Route::group(['prefix' => 'login'], function () {
    Route::get('', 'AuthController@showLoginForm')->name('professionals.showLoginForm');
    Route::post('', 'AuthController@login')->name('professionals.login');
});

Route::group(['prefix' => 'register'], function () {
    Route::get('', 'AuthController@showRegisterForm')->name('professionals.showRegisterForm');
    Route::post('', 'AuthController@register')->name('professionals.register');
});

Route::post('/logout', 'AuthController@logout')->name('professionals.logout');

/**
 * Application routes
 */
Route::group(['middleware' => 'auth:professional'], function () {
    Route::view('/home', 'professionals::home')->name('professionals.home');
});

