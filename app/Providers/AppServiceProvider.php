<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Gate::define('ver-clientes', function (User $user) {
            // return true;
            return $user->rol == 'A';
        });
        Gate::define('ver-polizas', function (User $user) {
            // return true;
            return $user->rol == 'A';
        });
    }
}
