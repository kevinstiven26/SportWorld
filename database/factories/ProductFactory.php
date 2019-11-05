<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Category;
use App\Product;
use App\Provider;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    $provider = Provider::all()->random(); 
    $category = Category::all()->random(); 

    return [
        'name' => $faker->word,
        'description' => $faker->paragraph(1),
        'price' => $faker->randomNumber(),
        'image' => $faker->word,
        'provider_id' => $provider->id,
        'category_id' => $category->id, 
    ];
});