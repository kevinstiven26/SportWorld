<?php

namespace App;

use App\User;
use App\Order;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = [
        'identification',
        'name',
        'phone_number',
        'address',
        'email',
        'user_id',
    ];

    public function user()
    {
        return $this->hasOne(User::class);
    }

    public function orders() {
        return $this->hasMany(Order::class);
    }
}
