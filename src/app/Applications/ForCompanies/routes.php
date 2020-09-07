<?php

/**
 * Authentication routes
 */
Route::group(['prefix' => 'login'], function () {
    Route::get('', 'AuthController@showLoginForm');
    Route::post('', 'AuthController@login');
});

Route::group(['prefix' => 'register'], function () {
    Route::get('', 'AuthController@showRegisterForm');
    Route::post('', 'AuthController@register');
});