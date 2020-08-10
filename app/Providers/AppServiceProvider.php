<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
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
        Gate::define('isAdmin', function ($user) {
            return $user->role = 'admin';
        });

        Gate::define('isUser', function ($user) {
            return $user->role = 'user';
        });

        Gate::define('isMember', function ($user) {
            return $user->role = 'member';
        });
    }
}
