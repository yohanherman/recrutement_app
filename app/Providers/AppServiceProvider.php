<?php

namespace App\Providers;

use App\Models\jobApplications;
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
        View()->composer('*', function ($view) {
            if (Auth ::check()) {
                $nbrOfApplication = jobApplications::where('recrutor_id', Auth::id())
                ->where('status_id', 1)
                ->sum('recrutor_id');
                $view->with('applicationReceived', $nbrOfApplication);
            }
        });
    }
}
