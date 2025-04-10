<?php

namespace App\Providers;

use App\Http\Middleware\RoleMiddleware;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;

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
        Route::aliasMiddleware('admin',AdminMiddleware::class);

        Gate::define('isAdmin', function($user){
            return $user->role === 'admin';
        });
        Route::aliasMiddleware('commercial',CommercialMiddleware::class);

        Gate::define('isCommercial', function($user){
            return $user->role === 'commercial';
        });
        

    }
}
