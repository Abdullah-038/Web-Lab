<?php

namespace App\Models;

use App\Events\ProductCreated;
use App\Events\ProductDeleted;
use App\Events\ProductUpdated;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'image',
        'description',
        'price',
    ];

    protected $casts = [
        'price' => 'decimal:2',
    ];

    protected $dispatchesEvents = [
        'created' => ProductCreated::class,
        'updated' => ProductUpdated::class,
        'deleted' => ProductDeleted::class,
    ];
}