<?php

namespace App\Providers;

use App\Models\Favourites;
use Illuminate\Support\Facades\Auth;
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
    view()->composer('partials.navbar', function ($view) {
        $favoriteCount = 0; // Default value if the user is not logged in

        // Check if the user is logged in
        if (auth()->check()) {
            // Retrieve the count of favorite events for the user
            $favoriteCount = Favourites::where('email', auth()->user()->email)->count();
        }

        $view->with('favoriteCount', $favoriteCount);
    });
}
}
