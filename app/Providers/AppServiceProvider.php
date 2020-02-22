<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Stancl\Tenancy\Middleware\InitializeTenancy;

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
        /*$this->app->bind(InitializeTenancy::class, function ($app) {
            return new InitializeTenancy(function ($exception) {
                return redirect('/');
            });
        });*/
    }
}
