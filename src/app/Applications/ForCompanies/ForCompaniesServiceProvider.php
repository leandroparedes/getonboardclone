<?php

namespace App\Applications\ForCompanies;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class ForCompaniesServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/config.php', 'companies');
    }

    public function boot()
    {
        $this->loadViewsFrom(__DIR__.'/Frontend/Views', 'companies');
        $this->configureRoutes();
    }

    public function configureRoutes()
    {
        Route::group([
            'namespace' => 'App\Applications\ForCompanies\Controllers',
            'prefix' => 'companies',
            'middleware' => 'web'
        ], function () {
            $this->loadRoutesFrom(__DIR__.'/routes.php');
        });
    }
}