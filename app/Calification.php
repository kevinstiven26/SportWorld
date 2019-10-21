<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Calification extends Model
{
    protected $fillable = [
        'calification',
        'observation',
        'order_id',
    ];
}
