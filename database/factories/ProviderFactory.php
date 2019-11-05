<?php

use App\Provider;
use Faker\Generator as Faker;

$factory->define(Provider::class, function (Faker $faker) {
    return [
        'nit' => $faker->randomNumber(),
        'name' => $faker->word,
        'logo_image' => $faker->randomElement(['imagen1', 'imagen2']),
        'phone_number' => $faker->phoneNumber,
        'address' => $faker->address, 
    ];
});