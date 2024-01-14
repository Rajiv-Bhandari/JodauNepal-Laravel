<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class MyServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(
            'App\Services\Interfaces\CategoryService',
            'App\Services\ICategoryService'
        );   
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
