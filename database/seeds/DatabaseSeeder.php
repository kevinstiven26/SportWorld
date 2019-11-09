<?php

use App\Category;
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
        // factory(Category::class, 50)->create();
    }
}
