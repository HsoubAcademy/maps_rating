<?php

namespace App\Providers;

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
        view()->composer(['includes.header', 'includes.category_list'], 'App\Http\ViewComposers\CategoryComposer');

        \Blade::if('owner', function() {
            return auth()->check() && auth()->user()->hasRole('Owner');
        });
    }
}
