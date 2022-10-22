<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ServiceTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('service_types')->insert([
        [    'service_id'       => '1',
            'service_type_english'   => 'Test type 1',
            'service_type_arabic'    => 'نوع الاختبار 1',
            'has_sub_type' => '1',
        ],
        [
            'service_id'       => '1',
            'service_type_english'   => 'Test type 2',
            'service_type_arabic'    => 'نوع الاختبار 2',
            'has_sub_type' => '1',
        ]
       ]);
    }
}
