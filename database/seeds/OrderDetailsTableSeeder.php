<?php

use Illuminate\Database\Seeder;
use App\Product;

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
                'order_id' => 1            ],
            [
                'product_id' => 4,
                'quantity' => 2,
                'unit_price' => \App\Product::find(4)-> getDiscountPriceAttribute(),
                'order_id' => 1
            ],
            [
                'product_id' => 3,
                'quantity' => 2,
                'unit_price' => \App\Product::find(3)-> getDiscountPriceAttribute(),
                'order_id' => 2
            ],
            [
                'product_id' => 7,
                'quantity' => 3,
                'unit_price' => \App\Product::find(7)-> getDiscountPriceAttribute(),
                'order_id' => 2
            ],
            [
                'product_id' => 5,
                'quantity' => 1,
                'unit_price' => \App\Product::find(5)-> getDiscountPriceAttribute(),
                'order_id' => 2
            ],
            [
                'product_id' => 9,
                'quantity' => 2,
                'unit_price' => \App\Product::find(9)-> getDiscountPriceAttribute(),
                'order_id' => 3
            ],
            [
                'product_id' => 15,
                'quantity' => 3,
                'unit_price' => \App\Product::find(15)-> getDiscountPriceAttribute(),
                'order_id' => 3
            ],
            [
                'product_id' => 3,
                'quantity' => 1,
                'unit_price' => \App\Product::find(3)-> getDiscountPriceAttribute(),
                'order_id' => 4
            ],
            [
                'product_id' => 6,
                'quantity' => 2,
                'unit_price' => \App\Product::find(6)-> getDiscountPriceAttribute(),
                'order_id' => 4
            ],
            [
                'product_id' => 13,
                'quantity' => 1,
                'unit_price' => \App\Product::find(13)-> getDiscountPriceAttribute(),
                'order_id' => 4
            ],
            [
                'product_id' => 12,
                'quantity' => 1,
                'unit_price' => \App\Product::find(12)-> getDiscountPriceAttribute(),
                'order_id' => 5
            ],
            [
                'product_id' => 19,
                'quantity' => 1,
                'unit_price' => \App\Product::find(19)-> getDiscountPriceAttribute(),
                'order_id' => 5
            ],
            [
                'product_id' => 16,
                'quantity' => 1,
                'unit_price' => \App\Product::find(16)-> getDiscountPriceAttribute(),
                'order_id' => 6
            ],
            [
                'product_id' => 13,
                'quantity' => 1,
                'unit_price' => \App\Product::find(13)-> getDiscountPriceAttribute(),
                'order_id' => 7
            ],
            [
                'product_id' => 18,
                'quantity' => 1,
                'unit_price' => \App\Product::find(18)-> getDiscountPriceAttribute(),
                'order_id' => 7
            ],
            [
                'product_id' => 1,
                'quantity' => 1,
                'unit_price' => \App\Product::find(1)-> getDiscountPriceAttribute(),
                'order_id' => 8
            ],
            [
                'product_id' => 10,
                'quantity' => 1,
                'unit_price' => \App\Product::find(10)-> getDiscountPriceAttribute(),
                'order_id' => 8
            ],
            [
                'product_id' => 7,
                'quantity' => 1,
                'unit_price' => \App\Product::find(7)-> getDiscountPriceAttribute(),
                'order_id' => 9
            ],
            [
                'product_id' => 16,
                'quantity' => 1,
                'unit_price' => \App\Product::find(16)-> getDiscountPriceAttribute(),
                'order_id' => 9
            ],
            [
                'product_id' => 10,
                'quantity' => 2,
                'unit_price' => \App\Product::find(10)-> getDiscountPriceAttribute(),
                'order_id' => 9
            ],
            [
                'product_id' => 14,
                'quantity' => 1,
                'unit_price' => \App\Product::find(14)-> getDiscountPriceAttribute(),
                'order_id' => 10
            ],
            [
                'product_id' => 20,
                'quantity' => 3,
                'unit_price' => \App\Product::find(20)-> getDiscountPriceAttribute(),
                'order_id' => 10
            ]
        ]);
    }
}
