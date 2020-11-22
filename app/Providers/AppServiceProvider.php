<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Policies\PostPolicy;
use Illuminate\Support\Facades\Gate;


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
        // $this->registerPolicies();

        Gate::define('super-admin', function ($user) {

            return $user->role->name === 'superadmin';
            

        });
    }
}
