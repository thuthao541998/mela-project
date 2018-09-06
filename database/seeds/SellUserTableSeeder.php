<?php

use Illuminate\Database\Seeder;

class SellUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\DB::table('sell_users')->truncate();
        \Illuminate\Support\Facades\DB::table('sell_users') -> insert([
           [
                'name' => 'Admin',
               'email' => 'admin@admin.com',
               'password' => bcrypt('12345678')
           ],
        ]);
    }
}
