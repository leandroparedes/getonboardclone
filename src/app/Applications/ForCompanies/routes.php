<?php

/**
 * Authentication routes
 */
Route::group(['prefix' => 'login'], function () {
    Route::get('', 'AuthController@showLoginForm')->name('companies.showLoginForm');
    Route::post('', 'AuthController@login')->name('companies.login');
});

Route::group(['prefix' => 'register'], function () {
    Route::get('', 'AuthController@showRegisterForm')->name('companies.showRegisterForm');
    Route::post('', 'AuthController@register')->name('companies.register');
});