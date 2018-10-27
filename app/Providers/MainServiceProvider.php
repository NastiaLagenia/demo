<?php

namespace App\Providers;

use View;
use Illuminate\Support\ServiceProvider;

class MainServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
       View::composer(['layouts.base', 'layouts.main'], 'App\Providers\ViewComposers\SizeComposer');
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
