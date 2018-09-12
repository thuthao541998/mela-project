<?php

use Illuminate\Database\Seeder;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\DB::table('comments')->truncate();
        \Illuminate\Support\Facades\DB::insert([
            [
                'content' => 'Fast delivery. Carefully packed products',
                'product_id' => 1,
                'user_id' => 1
            ],
            [
                'content' => 'Products of good quality. Convenient to use',
                'product_id' => 2,
                'user_id' => 2
            ],
            [
                'content' => 'I ordered these liquid lipsticks in the shades Muse and Samantha. The color is a bit different then how it is swatched here on the site but still happy with the colors. I have a light skin tone and my lips have naturally a light pinky rose pigment',
                'product_id' => 3,
                'user_id' => 2
            ],
            [
                'content' => 'I\'m very fussy when it comes to lipstick - it must be long lasting, not drying, matte, thin on the lips and not flake',
                'product_id' => 1,
                'user_id' => 2
            ],
            [
                'content' => 'These are great in regards to staying power, just make sure they set 30 minutes to an hour before eating or drinking!',
                'product_id' => 4,
                'user_id' => 1
            ],
            [
                'content' => 'This lipstick is wonderfully pigmented, long lasting. The colors are for me more wearable than OFRA Long Lasting Liquid Lipsticks.',
                'product_id' => 1,
                'user_id' => 3
            ],
            [
                'content' => 'All I can say is WOW. I\'ve never used a matte liquid that stayed on so perfectly all night. I was eating, drinking champagne, and no movement. I used my clarisonic before bed and I didn\'t notice the lip was still intact...',
                'product_id' => 3,
                'user_id' => 1
            ]
        ]);
    }
}
