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
        $this->call([
            UserSeeder::class,
            AdminSeeder::class,
            DriverSeeder::class,
            ServiceSeeder::class,
            ServiceTypeSeeder::class,
            ServiceSubTypeSeeder::class,
            OrderSeeder::class,
            OrderAddressSeeder::class
        ]);
    }
}
