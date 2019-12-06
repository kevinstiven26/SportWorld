<?php

namespace App;

use App\Order;
use App\Category;
use App\Provider;
use App\AdditionalField;
use App\OrderProduct;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'description',
        'price',
        'image',
        'provider_id',
        'category_id',
    ];

    public function provider() {
        return $this->hasOne(Provider::class,'id','provider_id');
    }

    public function category() {
        return $this->hasOne(Category::class,'id','category_id');
    }

    public function additional_fields() {
        return $this->hasMany(AdditionalField::class);
    }

    public function orders_products() {
        return $this->hasMany(OrderProduct::class);
    }
}
