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

Route::post('/logout', 'AuthController@logout')->name('companies.logout');

/**
 * Application routes
 */
Route::group(['middleware' => 'auth:company'], function () {
    Route::view('/home', 'companies::home')->name('companies.home');
});

Route::group(['prefix' => 'jobs'], function () {
    Route::get('create', 'JobOfferController@showCreateForm')->name('companies.jobs.showCreateForm');
    Route::post('', 'JobOfferController@store')->name('companies.jobs.store');

    Route::get('{job_offer:slug}/edit', 'JobOfferController@showUpdateForm')->name('companies.jobs.updateCreateForm');
    Route::put('{job_offer:slug}', 'JobOfferController@update')->name('companies.jobs.update');

    Route::get('{job_offer:slug}/delete', 'JobOfferController@showDeleteView')->name('companies.jobs.showDeleteView');
    Route::delete('{job_offer:slug}', 'JobOfferController@delete')->name('companies.jobs.delete');

    Route::get('', 'JobOfferController@index')->name('companies.jobs.index');
    Route::get('{job_offer:slug}', 'JobOfferController@show');
});
