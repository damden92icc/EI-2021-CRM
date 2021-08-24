<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Auth;


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
        // register middleware @isClient to display on blade
          Blade::if('isClient', function(){
            return auth()->check() && auth()->user()->checkRole(1);
         });

        // register middleware @isClient to display on blade
            Blade::if('isManager', function(){
                return auth()->check() && auth()->user()->checkRole(2);
             });

                     // register middleware @isClient to display on blade
            Blade::if('isAdmin', function(){
                return auth()->check() && auth()->user()->checkRole(3);
             });

        }
}
