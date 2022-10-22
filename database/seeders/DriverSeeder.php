<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DriverSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('drivers')->insert([
        [    'name'     => 'John',
            'mobile'   => '3345733',
            'email'    => 'john@gmail.com',
            'id_proof' => 'drivers/id1.png',
        ],
        [
            'name'     => 'Sam',
            'mobile'   => '3363732',
            'email'    => 'sam@gmail.com',
            'id_proof' => 'drivers/id2.png',
        ]
       ]);
    }
}
