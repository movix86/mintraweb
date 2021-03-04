<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Providers\Blade;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        \Blade::component('components.sliders', 'componenteSlider');
    }
}
