<?php

namespace App;

use App\FieldProduct;
use Illuminate\Database\Eloquent\Model;

class FieldValue extends Model
{
    protected $fillable = [
        'name',
    ];

    public function field_products() {
        return $this->belongsToMany(FieldProduct::class);
    }
}
