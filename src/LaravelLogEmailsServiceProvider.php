<?php

namespace Codeat3\LaravelLogEmails;

use Illuminate\Foundation\Support\Providers\EventServiceProvider;
use Illuminate\Mail\Events\MessageSending;
use Illuminate\Support\ServiceProvider;

class LaravelLogEmailsServiceProvider extends ServiceProvider
{
    protected $listen = [
        MessageSending::class => [
            LaravelLogEmails::class,
        ]
    ];
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        /*
         * Optional methods to load your package assets
         */
        // $this->loadViewsFrom(__DIR__.'/../resources/views', 'laravel-log-emails');
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        // $this->loadRoutesFrom(__DIR__.'/routes.php');

        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../config/config.php' => config_path('laravel-log-emails.php'),
            ], 'config');

            if(! class_exists('CreateEmailsTable')) {
                $this->publishes([
                    __DIR__ . '/../database/migrations/create_emails_table.php.stub.php' => database_path('migrations/'.date('Y_m_d_His', time()).'_create_emails_table.php'),
                ], 'migrations');
            }


            // Publishing the views.
            /*$this->publishes([
                __DIR__.'/../resources/views' => resource_path('views/vendor/laravel-log-emails'),
            ], 'views');*/

            // Publishing assets.
            /*$this->publishes([
                __DIR__.'/../resources/assets' => public_path('vendor/laravel-log-emails'),
            ], 'assets');*/

            // Registering package commands.
            // $this->commands([]);
        }
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        // Automatically apply the package configuration
        $this->mergeConfigFrom(__DIR__.'/../config/config.php', 'laravel-log-emails');

        // Register the main class to use with the facade
        $this->app->singleton('laravel-log-emails', function () {
            return new LaravelLogEmails;
        });
    }
}
