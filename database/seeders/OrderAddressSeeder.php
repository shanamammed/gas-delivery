<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class OrderAddressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('order_address')->insert([
            'order_id' => '1',
            'user_id'  => '1',
            'address'  => 'Manama',
            'pincode'  => '000000',
            'latitude' => '11.34567',
            'longitude'=> '73.90909',
            'flat'     => '1245',
            'created_at'  => date('Y-m-d H:i:s')
        ]);
    }
}
