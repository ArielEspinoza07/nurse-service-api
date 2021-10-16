<?php

namespace App\Providers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;

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
        if (env('HEROKU_SERVER', false)) {
            Schema::defaultStringLength(191);
        }
        if ( ! app()->environment('local')) {
            URL::forceScheme('https');
        }
    }
}
