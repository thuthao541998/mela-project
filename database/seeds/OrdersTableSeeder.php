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
            ],
            [
                'total_price' => 1900000,
                'ship_name' => '$am $mith',
                'ship_address' => '49 Cam St , Cali',
                'ship_phone' => '02374354374'
            ],
            [
                'total_price' => 2000000,
                'ship_name' => 'sam smmith',
                'ship_address' => '49 Cam St , London',
                'ship_phone' => '02374354374'
            ],
            [
                'total_price' => 1200000,
                'ship_name' => '$am $mith',
                'ship_address' => '49 Baker St , London',
                'ship_phone' => '02374354374'
            ],
            [
                'total_price' => 800000,
                'ship_name' => 'Xuân Hùng',
                'ship_address' => 'Hồ Chí Minh city',
                'ship_phone' => '02374354374'
            ],
            [
                'total_price' => 240000,
                'ship_name' => 'Hồng Luyến',
                'ship_address' => 'Moscow',
                'ship_phone' => '02374354374'
            ],
            [
                'total_price' => 800000,
                'ship_name' => 'Đào Hùng',
                'ship_address' => 'Beijing, China',
                'ship_phone' => '02374354374'
            ],
            [
                'total_price' => 800000,
                'ship_name' => 'Hùng Đào',
                'ship_address' => '49 Cam St , New York',
                'ship_phone' => '02374354374'
            ],
            [
                'total_price' => 1200000,
                'ship_name' => 'Đào Luyến',
                'ship_address' => 'California',
                'ship_phone' => '02374354374'
            ],
            [
                'total_price' => 1400000,
                'ship_name' => 'Xuân An',
                'ship_address' => 'Tôn Thất Thuyết St , Hà Nội',
                'ship_phone' => '02374354374'
            ]
        ]);
    }
}
