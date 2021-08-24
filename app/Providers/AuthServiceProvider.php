<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        
       Gate::define('client-only', function ($user) {
        if ($user && $user->checkRole(1) ){
            return true;
        }
        return false;
    });


    Gate::define('admin-only', function ($user) {
        if ($user && $user->checkRole(3) ){
            return true;
        }
        return false;
    });

    

    Gate::define('manager-only', function ($user) {
        if ($user && $user->checkRole(2) ){
            return true;
        }
        return false;
    });

    Gate::define('accountant-only', function ($user) {
        if ($user && $user->checkRole(4) ){
            return true;
        }
        return false;
    });
    
    }
}
