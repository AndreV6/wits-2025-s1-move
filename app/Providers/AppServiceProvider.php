<?php

namespace App\Providers;

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
        // Adds a constraint to the wild card {id} in the routes so it doesn't match
        //  routes without parameters i.e. so "users/{id}" won't overwrite "users/create"
        Route::pattern('id', '[0-9]+');
        // Route::pattern('user', '[0-9]+');
        // Route::pattern('package', '[0-9]+');
        // Route::pattern('course', '[0-9]+');
        // Route::pattern('cluster', '[0-9]+');
        // Route::pattern('unit', '[0-9]+');
        // Route::pattern('timetable', '[0-9]+');
    }
}
