<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ServiceSubTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       DB::table('service_sub_types')->insert([
        [    'service_type_id' => '1',
             'service_id'      => '1',
             'sub_type_name'   => 'Test sub type1',
             'price'    => '2',
        ],
        [
            'service_type_id' => '1',
            'service_id'      => '1', 
            'sub_type_name'   => 'Test sub type 2',
            'price'    => '3',
        ],
        [
            'service_type_id' => '2',
            'service_id'      => '1', 
            'sub_type_name'   => 'Test sub type 3',
            'price'    => '23',
        ]
       ]);
    }
}
