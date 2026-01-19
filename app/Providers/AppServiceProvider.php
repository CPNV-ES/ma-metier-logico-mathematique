<?php

namespace App\Providers;

use Illuminate\Auth\Middleware\RedirectIfAuthenticated;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
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
        RedirectIfAuthenticated::redirectUsing(function () {
            if (Auth::guard('teacher')->check()) {
                return route('teacher.dashboard');
            }

            foreach (['dashboard', 'home'] as $routeName) {
                if (Route::has($routeName)) {
                    return route($routeName);
                }
            }

            return '/';
        });
    }
}
