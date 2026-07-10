<?php

namespace App\Providers;

use App\Models\About;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        // Share $about ke semua public views (sekali query, dipakai 9x)
        View::composer('public.*', function ($view) {
            $view->with('about', About::query()->first());
        });
    }
}
