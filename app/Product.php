<?php

namespace App;

use App\Order;
use App\Category;
use App\Provider;
use App\AdditionalField;
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
        'product_type_id',
    ];

    public function provider() {
        return $this->hasOne(Provider::class);
    }

    public function category() {
        return $this->hasOne(Category::class);
    }
 
    public function additional_fields() {
        return $this->hasMany(AdditionalField::class);
    }

    public function orders() {
        return $this->belongsToMany(Order::class);
    }
}
