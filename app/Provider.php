<?php

namespace App;

use App\Product;
use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{
    protected $fillable = [
        'nit',
        'name',
        'logo_image',
        'phone_number',
        'address',
    ];

    public function product() {
        return $this->belongsTo(Product::class);
    }
}
