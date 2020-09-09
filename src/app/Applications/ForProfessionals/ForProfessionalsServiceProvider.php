<?php

namespace App\Applications\ForProfessionals;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class ForProfessionalsServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/config.php', 'professionals');
    }

    public function boot()
    {
        $this->loadViewsFrom(__DIR__.'/Frontend/Views', 'professionals');
        $this->configureRoutes();
    }

    public function configureRoutes()
    {
        Route::group([
            'namespace' => 'App\Applications\ForProfessionals\Controllers',
            'prefix' => 'professionals',
            'middleware' => 'web'
        ], function () {
            $this->loadRoutesFrom(__DIR__.'/routes.php');
        });
    }
}