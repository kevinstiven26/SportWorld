<?php

namespace App;

use App\FieldProduct;
use Illuminate\Database\Eloquent\Model;

class FieldValue extends Model
{
    protected $fillable = [
        'name',
        'field_product_id',
    ];

    public function field_product() {
        return $this->belongsTo(FieldProduct::class);
    }
}
