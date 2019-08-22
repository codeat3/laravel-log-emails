<?php

namespace Codeat3\LaravelLogEmails;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Codeat3\LaravelLogEmails\Skeleton\SkeletonClass
 */
class LaravelLogEmailsFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'laravel-log-emails';
    }
}
