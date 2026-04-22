<?php

namespace App\Providers;

use App\Events\ProductCreated;
use App\Events\ProductDeleted;
use App\Events\ProductUpdated;
use App\Listeners\LogProductCrudActivity;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    protected $listen = [
        ProductCreated::class => [
            LogProductCrudActivity::class,
        ],
        ProductUpdated::class => [
            LogProductCrudActivity::class,
        ],
        ProductDeleted::class => [
            LogProductCrudActivity::class,
        ],
    ];

    public function boot(): void
    {
        //
    }
}