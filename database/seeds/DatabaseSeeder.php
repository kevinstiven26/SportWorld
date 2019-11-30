<?php

use App\Category;
use App\Product;
use App\Provider;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    { 
        factory(Provider::class, 10)->create();
        factory(Product::class, 20)->create();
    }
}
