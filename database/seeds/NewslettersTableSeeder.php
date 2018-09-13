<?php

use Illuminate\Database\Seeder;

class NewslettersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        \Illuminate\Support\Facades\ DB::table('newsletters')->truncate();
//        \Illuminate\Support\Facades\DB::table('newsletters')->insert([
//            [
//                'subject'=>'jeranga',
//                'password'=>'02jd,xne',
//                'email'=>'jeranga@gmail.com',
//                'address'=>'22 Jump Street',
//                'phone'=>'5553743',
//                'birthday'=>'14/9/2001'
//            ],
//            [
//                'username'=>'Shenanigans22',
//                'password'=>'01jdsfbz',
//                'email'=>'Shenanigans22@gmail.com',
//                'address'=>'30 Wall Street',
//                'phone'=>'5552948',
//                'birthday'=>'5/9/1993'
//            ],
//            [
//                'username'=>'kinger1023',
//                'password'=>'xmnseiuw',
//                'email'=>'kinger1023@gmail.com',
//                'address'=>'1 Hacker Street',
//                'phone'=>'5552038',
//                'birthday'=>'14/12/1983'
//            ],
//            [
//                'username'=>'Jeremyny1',
//                'password'=>'iuwcnsde',
//                'email'=>'Jeremyny1@gmail.com',
//                'address'=>'13 Baker Street',
//                'phone'=>'5553092',
//                'birthday'=>'30/9/1998'
//            ],
//            [
//                'username'=>'Reddit__PI',
//                'password'=>'830nxcjy8',
//                'email'=>'Reddit__PI@gmail.com',
//                'address'=>'21 Jump Street',
//                'phone'=>'5550321',
//                'birthday'=>'19/9/2008'
//            ],
//            [
//                'username'=>'Noerdy',
//                'password'=>'ojncueya',
//                'email'=>'Noerdy@gmail.com',
//                'address'=>'198 1 Street',
//                'phone'=>'5559381',
//                'birthday'=>'24/11/2006'
//            ],
//            [
//                'username'=>'SaltyFuthermucker',
//                'password'=>'0siuskdx',
//                'email'=>'SaltyFuthermucker@gmail.com',
//                'address'=>'70 La Pigalle Street',
//                'phone'=>'5558713',
//                'birthday'=>'14/4/2011'
//            ],
//            [
//                'username'=>'RockyStar1122',
//                'password'=>'oqwinxde',
//                'email'=>'RockyStar1122@gmail.com',
//                'address'=>'22 Via Dolorosa Street',
//                'phone'=>'5553092',
//                'birthday'=>'7/7/2018'
//            ],
//            [
//                'username'=>'Scouttheearth',
//                'password'=>'xmnwiuew',
//                'email'=>'Scouttheearth@gmail.com',
//                'address'=>'24 The Bowery',
//                'phone'=>'5559127',
//                'birthday'=>'29/1/2007'
//            ],
//            [
//                'username'=>'Rhadness',
//                'password'=>'23947s83',
//                'email'=>'Rhadness@gmail.com',
//                'address'=>'2 Harley Street',
//                'phone'=>'5553725',
//                'birthday'=>'25/11/2011'
//            ],
//            [
//                'username'=>'BunyipPouch',
//                'password'=>'xmiwendf',
//                'email'=>'BunyipPouch@gmail.com',
//                'address'=>'220 Chandni Chowk',
//                'phone'=>'5550912',
//                'birthday'=>'1/9/1987'
//            ],
//            [
//                'username'=>'therap321',
//                'password'=>'ksfi2nxm',
//                'email'=>'therap321@gmail.com',
//                'address'=>'20 Grafton Street',
//                'phone'=>'5559273',
//                'birthday'=>'14/9/2001'
//            ],
//            [
//                'username'=>'oDaum',
//                'password'=>'q09enxko',
//                'email'=>'oDaum@gmail.com',
//                'address'=>'21 Orchard Road',
//                'phone'=>'5558730',
//                'birthday'=>'17/10/2003'
//            ],
//            [
//                'username'=>'Noobsicles',
//                'password'=>'019238983',
//                'email'=>'Noobsicles@gmail.com',
//                'address'=>'2 HDD Street',
//                'phone'=>'5558743',
//                'birthday'=>'4/2/1998'
//            ],
//            [
//                'username'=>'SlowPadparadscha',
//                'password'=>'mememememe',
//                'email'=>'SlowPadparadscha@gmail.com',
//                'address'=>'14 Carnaby Street',
//                'phone'=>'5553743',
//                'birthday'=>'14/9/1996'
//            ],
//            [
//                'username'=>' Little-Red',
//                'password'=>'ouenxhds',
//                'email'=>' Little-Red@gmail.com',
//                'address'=>'1 The Shankill Road',
//                'phone'=>'5553743',
//                'birthday'=>'19/4/1992'
//            ],
//            [
//                'username'=>'Bobthecow775',
//                'password'=>'bobbyrules',
//                'email'=>'Bobthecow775@gmail.com',
//                'address'=>'11 The Falls Road',
//                'phone'=>'5553743',
//                'birthday'=>'14/9/2001'
//            ],
//            [
//                'username'=>'powersurge28',
//                'password'=>'zjdiqeuq',
//                'email'=>'powersurge28@gmail.com',
//                'address'=>'80 Bourbon Street',
//                'phone'=>'5553743',
//                'birthday'=>'24/5/2008'
//            ],
//            [
//                'username'=>'dabausman',
//                'password'=>'oiadjfamca',
//                'email'=>'dabausman@gmail.com',
//                'address'=>'12 Savile Row',
//                'phone'=>'5557592',
//                'birthday'=>'14/9/1993'
//            ],
//            [
//                'username'=>'drewiepoodle',
//                'password'=>'qijaodfnv',
//                'email'=>'drewiepoodle@gmail.com',
//                'address'=>'180 La Rambla',
//                'phone'=>'5550946',
//                'birthday'=>'10/5/2012'
//            ]
//        ]);
        \Illuminate\Support\Facades\DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
