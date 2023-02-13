<?php

namespace App\Providers;

use App\Services\CatsService;
use Illuminate\Support\ServiceProvider;

class CatsServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(CatsService::class, function ($app) {
            return new CatsService();
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}