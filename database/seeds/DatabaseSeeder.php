<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {


        // $this->call(UsersTableSeeder::class);

        $this->call(ProductTableSeeder::class);
        $this->call(ArticlesTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(BrandsTableSeeder::class);
        $this->call(OrderDetailsTableSeeder::class);
        $this->call(OrdersTableSeeder::class);
        $this->call(SellUserTableSeeder::class);

    }
}
