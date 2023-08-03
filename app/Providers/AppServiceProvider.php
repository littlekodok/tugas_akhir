<?php

namespace App\Providers;


use App\Models\User;
use Illuminate\Support\Carbon;
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
        // if (isset($_SERVER['HTTPS']) && ($_SERVER['HTTPS'] == 'on' || $_SERVER['HTTPS'] == 1) || isset($_SERVER['HTTP_X_FORWARDED_PROTO']) &&  $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https') {
        //     \URL::forceScheme('https');
        // }
        Gate::define('admin', function (User $user) {
            return $user->akses === "Admin";
        });
        Gate::define('wp', function (User $user) {
            return $user->akses === "Wajib Pajak";
        });
        config(['app.locale' => 'id']);
        Carbon::setLocale('id');
    }
}
