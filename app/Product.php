<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $fillable = [
        'product_name', 'product_type', 'product_size', 'description', 'product_prize', 'product_image', 'is_deleted'
    ];

    protected $table = 'products';
}
