<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    //
    protected $fillable = [
        'branch_name', 'location', 'manager_name', 'manager_mobile', 'is_deleted'
    ];

    protected $table = 'branches';
}
