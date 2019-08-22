<?php

namespace Codeat3\LaravelLogEmails;

use Illuminate\Foundation\Support\Providers\EventServiceProvider;
use Illuminate\Mail\Events\MessageSending;
use Illuminate\Support\ServiceProvider;

class LaravelLogEmailsEventServiceProvider extends ServiceProvider
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

    }

    /**
     * Register the application services.
     */
    public function register()
    {

    }
}
