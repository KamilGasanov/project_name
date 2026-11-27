<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $this->loadViewsFrom(base_path('labs/3_main/views'), 'lab3');
        $this->loadViewsFrom(base_path('labs/4_preview/views'), 'lab4');
        $this->loadViewsFrom(base_path('labs/5_reg/resources/views'), 'lab5');
        $this->loadViewsFrom(base_path('labs/6_articles/views'), 'lab6');
        $this->loadMigrationsFrom(base_path('labs/6_articles/migrations'));
    }
}
