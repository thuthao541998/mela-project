<?php

use Illuminate\Database\Seeder;

class OrdersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        \Illuminate\Support\Facades\DB::table('orders')->truncate();
        \Illuminate\Support\Facades\DB::table('orders')->insert([
            [
                'total_price' => 1000000,
                'ship_name' => 'Sam Smith',
                'ship_address' => '49 Cam St , Cali',
                'ship_phone' => '02374354374'
            ]
        ]);
    }
}
