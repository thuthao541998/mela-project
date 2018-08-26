<?php

use Illuminate\Database\Seeder;

class OrderDetailsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        \Illuminate\Support\Facades\DB::table('order_details')->truncate();
        \Illuminate\Support\Facades\DB::table('order_details')->insert([
            [
                'productId' => 1,
                'quantity' => 3,
                'unitprice' => \App\Product::find('productId')->getPrice(),
                'orderId' => 1
            ],
            [
                'productId' => 2,
                'quantity' => 1,
                'unitprice' => \App\Product::find('productId')->getPrice(),
                'orderId' => 1
            ],
            [
                'productId' => 4,
                'quantity' => 2,
                'unitprice' => \App\Product::find('productId')->getPrice(),
                'orderId' => 1
            ]
        ]);
    }
}
