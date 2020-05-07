<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transactions extends Model
{
    //
    protected $fillable = [
        'customer_name', 'customer_mobile', 'customer_address', 'total_cost', 'branch_id', 'payment_status', 'reference'
    ];

    protected $table = 'transactions';
}
