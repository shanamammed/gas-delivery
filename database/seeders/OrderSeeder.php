<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
         DB::table('orders')->insert([
            'user_id'    => '1',
            'service_id' => '1',
            'service_type' => 'Gas delivery',
            'sub_type'     => '40lb gas with cylinder',
            'quantity' => '1',
            'total'    => '10',
            'notes'    => '',
            'order_delivered_by' => NULL,
            'booked_at'   => date('Y-m-d H:i:s'),
            'status'      => '1',
            'created_at'  => date('Y-m-d H:i:s')
        ]);
    }
}
