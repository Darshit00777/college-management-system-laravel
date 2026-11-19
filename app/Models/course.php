<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class course extends Model
{
    protected $fillable = [
        'cname',
        'duration',
        'fees',
        'discount',
        'f_fees'
    ];
}
