<?php

namespace App\Providers;

use App\Events\UserRegistered;
use App\Notifications\WelcomeNotification;
use Illuminate\Support\ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    protected $listen = [
        UserRegistered::class => [
            WelcomeNotification::class
        ]
    ];

    public function shouldDiscoverEvents(): bool
    {
        return false;
    }
}
