<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Purchased extends Model
{
    //
    protected $fillable = [
        'transaction_id', 'product_id', 'product_name', 'single_cost', 'quantity', 'total_cost'
    ];

    protected $table = 'purchased_items';
}
