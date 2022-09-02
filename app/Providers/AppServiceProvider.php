<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

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
        Paginator::useBootstrap();

        Gate::define('admin', function ($user) {
            if ($user->access == true) {
                return true;
            }
            return false;
        });

        Gate::define('mahasiswa', function ($user) {
            if ($user->access == false) {
                return true;
            }
            return false;
        });
    }
}
