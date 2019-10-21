<?php

namespace App;

use App\Product;
use App\FieldProduct;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name',
        'category',
    ];

    public function product() {
        return $this->belongsTo(Product::class);
    }

    public function field_products() {
        return $this->belongsToMany(FieldProduct::class);
    }
}
