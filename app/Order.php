<?php

namespace App;

use App\Product;
use App\Customer;
use App\AdditionalField;
use App\OrderProduct;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'date',
        'city',
        'address',
        'observations',
        'state',
        'deliver_date',
        'guide_number',
        'customer_id',
    ];

    public function customer() {
        return $this->belongsTo(Customer::class);
    }

    public function additional_fields() {
        return $this->hasMany(AdditionalField::class);
    }

    public function orders_products() {
        return $this->hasMany(OrderProduct::class);
    }
}
