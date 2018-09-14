<?php

use Illuminate\Database\Seeder;

class ContactsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        \Illuminate\Support\Facades\ DB::table('contacts')->truncate();
        \Illuminate\Support\Facades\DB::table('contacts')->insert([
            [
                'email'=>'ungtra2814@gmail.com'
            ],
            [
                'email'=>'thuthao541998@gmail.com'
//            ],
//            [
//                'email'=>'jeewa@gmail.com'
//            ],
//            [
//                'email'=>'Jeremyny1@gmail.com'
//            ],
//            [
//                'email'=>'Reddit__PI@gmail.com'
//            ],
//            [
//                'email'=>'Noerdy@gmail.com'
//            ],
//            [
//                'email'=>'SaltyFuthermucker@gmail.com'
//            ],
//            [
//                'email'=>'RockyStar1122@gmail.com'
//            ],
//            [
//                'email'=>'Scouttheearth@gmail.com'
//            ],
//            [
//                'email'=>'Rhadness@gmail.com'
//            ],
//            [
//                'email'=>'BunyipPouch@gmail.com'
//            ],
//            [
//                'email'=>'therap321@gmail.com'
//            ],
//            [
//                'email'=>'oDaum@gmail.com'
//            ],
//            [
//                'email'=>'Noobsicles@gmail.com'
//            ],
//            [
//                'email'=>'SlowPadparadscha@gmail.com'
//            ],
//            [
//                'email'=>' Littlered@gmail.com'
//            ],
//            [
//                'email'=>'Bobthecow775@gmail.com'
//            ],
//            [
//                'email'=>'powersurge28@gmail.com'
//            ],
//            [
//                'email'=>'dabausman@gmail.com'
//            ],
//            [
//                'email'=>'drewiepoodle@gmail.com'
            ]
        ]);
        \Illuminate\Support\Facades\DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
