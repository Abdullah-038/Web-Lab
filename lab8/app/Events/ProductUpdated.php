<?php

namespace App\Events;

use App\Models\Product;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ProductUpdated
{
    use Dispatchable;
    use InteractsWithSockets;
    use SerializesModels;

    public function __construct(public Product $product)
    {
    }
}