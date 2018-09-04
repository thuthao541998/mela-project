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
                'product_id' => 1,
                'quantity' => 3,
                'unit_price' => \App\Product::find(1)->getDiscountPriceAttribute(),
                'order_id' => 1
            ],
            [
                'product_id' => 2,
                'quantity' => 1,
                'unit_price' => \App\Product::find(2)->getDiscountPriceAttribute(),
                'order_id' => 1
            ],
            [
                'product_id' => 4,
                'quantity' => 2,
                'unit_price' => \App\Product::find(4)-> getDiscountPriceAttribute(),
                'order_id' => 1
            ]
        ]);
    }
}
