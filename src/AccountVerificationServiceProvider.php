<?php

namespace MyShell\AccountVerification;

use Illuminate\Support\ServiceProvider;

class AccountVerificationServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadMigrationsFrom(__DIR__.'/Migrations');
        $this->loadViewsFrom(__DIR__. '/Views', 'account-verification');
        $this->loadRoutesFrom(__DIR__. '/Routes/web.php');

    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
    }
}
