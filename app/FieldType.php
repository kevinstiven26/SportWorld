<?php

namespace App;

use App\FieldProduct;
use Illuminate\Database\Eloquent\Model;

class FieldType extends Model
{
    protected $fillable = [
        'name',
    ];

    public function field_product() {
        return $this->belongsTo(FieldProduct::class);
    }
}
