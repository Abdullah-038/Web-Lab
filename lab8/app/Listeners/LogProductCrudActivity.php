<?php

namespace App\Listeners;

use App\Events\ProductCreated;
use App\Events\ProductDeleted;
use App\Events\ProductUpdated;
use Illuminate\Support\Facades\Log;

class LogProductCrudActivity
{
    public function handle(object $event): void
    {
        if ($event instanceof ProductCreated) {
            Log::info('Product created', [
                'id' => $event->product->id,
                'name' => $event->product->name,
            ]);

            return;
        }

        if ($event instanceof ProductUpdated) {
            Log::info('Product updated', [
                'id' => $event->product->id,
                'name' => $event->product->name,
            ]);

            return;
        }

        if ($event instanceof ProductDeleted) {
            Log::info('Product deleted', [
                'id' => $event->product->id,
                'name' => $event->product->name,
            ]);
        }
    }
}