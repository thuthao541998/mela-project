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
                'total_price' => 54800,
                'ship_name' => 'Sam Smith`s',
                'ship_address' => '49 Cam Saint, Cali',
                'ship_phone' => '02374354374'
            ],
            [
                'total_price' => 74290,
                'ship_name' => 'Sam The Smiths',
                'ship_address' => '49 Cam Street, Cali-Dali',
                'ship_phone' => '02374354374'
            ],
            [
                'total_price' => 82350,
                'ship_name' => 'Sam Smithstory',
                'ship_address' => '49Y Cam Str, Californya',
                'ship_phone' => '02374354374'
            ],
            [
                'total_price' => 70020,
                'ship_name' => 'Little Sammy Smith',
                'ship_address' => '49 Cammy Str, Cali',
                'ship_phone' => '02374354374'
            ],
            [
                'total_price' => 80200,
                'ship_name' => 'Sams Mith',
                'ship_address' => '49 Cam Street, Calif',
                'ship_phone' => '02374354374'
            ],
            [
                'total_price' => 30001,
                'ship_name' => 'Sam Smither',
                'ship_address' => '49E Cam Street, Cali',
                'ship_phone' => '02374354374'
            ],
            [
                'total_price' => 74090,
                'ship_name' => 'Sam Smithsonia',
                'ship_address' => '49 Cam St , Californya',
                'ship_phone' => '02374354374'
            ],
            [
                'total_price' => 123000,
                'ship_name' => '$am $mith',
                'ship_address' => '49 Cam Street , Cali',
                'ship_phone' => '02374354374'
            ],
            [
                'total_price' => 83090,
                'ship_name' => 'Sam Smiths',
                'ship_address' => '49 Cam Str , California',
                'ship_phone' => '02374354374'
            ],
            [
                'total_price' => 90000,
                'ship_name' => 'Sam Blacksmith',
                'ship_address' => '49D Cam St , California',
                'ship_phone' => '02374354374'
            ],
            [
                'total_price' => 80000,
                'ship_name' => 'Sam Smithy',
                'ship_address' => '49 Cam St, Kali',
                'ship_phone' => '02374354374'
            ],
            [
                'total_price' => 70000,
                'ship_name' => 'Sem Smith',
                'ship_address' => '49C Cam St , Cali',
                'ship_phone' => '02374354374'
            ],
            [
                'total_price' => 10002,
                'ship_name' => 'Sam Smithereen',
                'ship_address' => '49B Cam St, Cali',
                'ship_phone' => '02374354374'
            ],
            [
                'total_price' => 20839,
                'ship_name' => 'Xampp Smith',
                'ship_address' => '49A Cam St , Cali',
                'ship_phone' => '02374354374'
            ],
            [
                'total_price' => 90000,
                'ship_name' => 'Sammie Smith',
                'ship_address' => '49 Cam Station, Cali',
                'ship_phone' => '02374354374'
            ],
            [
                'total_price' => 800000,
                'ship_name' => 'Uncle Sam Smith',
                'ship_address' => '49 Cam Str , Cali',
                'ship_phone' => '02374354374'
            ],
            [
                'total_price' => 240000,
                'ship_name' => 'Samantha Smith',
                'ship_address' => '49 Cami St , Cali',
                'ship_phone' => '02374354374'
            ],
            [
                'total_price' => 10000,
                'ship_name' => 'Sam Smith',
                'ship_address' => '49 Cam St , Cali',
                'ship_phone' => '02374354374'
            ],
            [
                'total_price' => 50000,
                'ship_name' => 'Samuel Smith',
                'ship_address' => '49 Cam St , Calif',
                'ship_phone' => '02374354374'
            ],
            [
                'total_price' => 40000,
                'ship_name' => 'Sammy Smith',
                'ship_address' => '49 Cam St , California',
                'ship_phone' => '02374354374'
            ]
        ]);
    }
}
