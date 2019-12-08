<?php

namespace App;

use App\Order;
use App\Product;
use App\FieldProduct;
use Illuminate\Database\Eloquent\Model;

class AdditionalField extends Model
{
    protected $fillable = [
        'value',
        'product_id',
        'field_product_id',
        'order_id',
    ];

    public function order() {
        return $this->belongsTo(Order::class);
    }

    public function product() {
        return $this->belongsTo(Product::class);
    }

    public function field_product()
    {
        return $this->hasOne(FieldProduct::class);
    }
}
