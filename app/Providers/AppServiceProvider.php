<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
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
        View::composer("*", function ($view) {
            $view->with("isEmployee", auth()->check() && auth()->user()->isEmployee());
            $view->with("isEmployer", auth()->check() && auth()->user()->isEmployer());
        });
    }
}
