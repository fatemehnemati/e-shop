<?php

namespace Database\Seeders;

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
        \App\Models\Category::Factory(5)->create();
        \App\Models\product::Factory(22)->create();
        // \App\Models\User::factory(10)->create();
    }
}
