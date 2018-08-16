<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        \Illuminate\Support\Facades\DB::table('categories')->truncate();
        \Illuminate\Support\Facades\DB::table('categories')->insert([
            [
                'name' => 'Lipstick',
                'images' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR81NLdW06WdMGkj160-JKrFThFXCYqSyShd85PTd4uRDpEnmHw',
                'description' => 'Lipstick is a cosmetic product containing pigments, oils-v, waxes, and emollients that apply color, texture, and protection to the lips.'
            ],
            [
                'name' => 'Lip Gloss',
                'images' => 'https://static-assets.glossier.com/production/spree/images/attachments/000/001/097/portrait_normal/LG_PDP_01-compressor.jpg?1491249045',
                'description' => 'Lip gloss is a product used primarily to give lips a glossy lustre, and sometimes to add a subtle color. It is distributed as a liquid or a soft solid (not to be confused with lip balm, which generally has medical or soothing purposes) or lipstick, which generally is a solid, cream like substance that gives off a more pigmented color',
            ],
            [
                'name' => 'Lip Liner',
                'images' => 'https://cdn.shopify.com/s/files/1/0648/1955/files/100_pure_creamy_long_last_lip_liner_collection.jpg',
                'description' => 'Lip liner, also known as a lip pencil, is a cosmetic product. It is intended to fill in uneven areas on the outer edges of the lips before applying lipstick to give a smoother shape. It is also used to outline the lips, keeping lipstick inside the lip area and preventing it from "bleeding", creating a bigger contrast and making the lips stand out more.',
            ],
            [
                'name' => 'Lip Stain',
                'images' => 'https://www.elfcosmetics.com/dw/image/v2/BBXC_PRD/on/demandware.static/-/Sites-elf-master/default/dw53ab0477/13206_22124_900px_new254755.01.jpg?sw=1100&sh=1100&sm=fit&sfrm=jpg',
                'description' => 'Lip stain is a cosmetic product used to color the lips, usually in form of a liquid or gel. It generally stays on longer than lipstick by leaving a stain of color on the lips.'
            ],
            [
                'name' => 'Lip Balm',
                'images' => 'https://01.avoncdn.com/shop/assets/en/prod/prod_1198603_xl.jpg?w=700',
                'description' => 'Lip balm or lip salve is a wax-like substance applied topically to the lips of the mouth to moisturize and relieve chapped or dry lips, angular cheilitis, stomatitis, or cold sores'
            ]
        ]);
    }
}
