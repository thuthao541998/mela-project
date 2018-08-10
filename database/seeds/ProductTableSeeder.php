<?php

use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products') -> insert([
            ['name' => 'Crystal GelGloss',
                'price'=> '400.000',
                'images'=> 'https://www.shiseido.com/dw/image/v2/BBSK_PRD/on/demandware.static/-/Sites-itemmaster_shiseido/default/dw83d67e60/images/hi-res/0730852148239.jpg?sw=540&sh=540&sm=fit',
                'description' => 'This flexible, non-drying formula boasts a superior refractive index that boosts color vibrancy when worn as a top coat and creates the illusion of fuller lips. This crystalline fluid is infused with a moisturizing blend of oils for an effortless glide and high-shine polymers to lend lips an intense shine. Free of shimmer that can compromise clarity, this crystal-clear varnish is housed in a sleek tube with an integrated applicator that minimizes color contamination when the gloss is layered over pigmented products. Dermatologist-tested.',
                'overview' => 'This ultra-clear, hydrating gloss provides a Lucite-like finish that leaves lips looking wet and ultra shiny.',
                'brand' => 'Shiseido'
            ],
            ['name' => 'LacquerInk LipShine ',
                'price'=> '400.000',
                'images'=> 'https://www.shiseido.com/dw/image/v2/BBSK_PRD/on/demandware.static/-/Sites-itemmaster_shiseido/default/dw281d47f7/images/alt1/0730852148260-main.jpg?sw=540&sh=540&sm=fit',
                'description' => 'The unique blend of oils in this hybrid formula offers the shine and comfort of a gloss, while smoothing polymers provide the durable, hydrating color of a lipstick. A custom, concave applicator hugs the contours of the mouth and dispenses the perfect amount of pigment that can be worn alone or layered over other lip products for extra dimension and sheen. Available in 12 shades, this full-coverage fluid deposits inky color with a vivid, vinyl finish. Dermatologist-tested.',
                'overview' => 'The high-intensity pigment meets the luminosity of a gloss in this featherweight formula that never leaves lips feeling dry or sticky.',
                'brand' => 'Shiseido'
            ],
            ['name' => 'VisionAiry Gel Lipstick',
                'price'=> '400.000',
                'images'=> 'https://www.shiseido.com/dw/image/v2/BBSK_PRD/on/demandware.static/-/Sites-itemmaster_shiseido/default/dwcc1e883f/images/hi-res/0729238151994.jpg?sw=540&sh=540&sm=fit',
                'description' => 'Using revolutionary Triple Gel Technology, this breakthrough formula allows high levels of pigment to converge with water for cushiony, comfortable, weightless color that stays put for six hours. This ultra-sleek lipstick bullet glides on to deliver bold, high-impact color in a single stroke. Available in 28 shades inspired by modern Tokyo. Dermatologist-tested.',
                'overview' => 'A long-lasting, full-coverage lipstick featuring innovative Triple Gel Technology for high-impact, weightless color.',
                'brand' => 'Shiseido'
            ],
            ['name' => 'Aura Dew - Face, Eyes, Lips',
                'price'=> '400.000',
                'images'=> 'https://www.shiseido.com/dw/image/v2/BBSK_PRD/on/demandware.static/-/Sites-itemmaster_shiseido/default/dw501aab6f/images/alt6/0730852148697.jpg?sw=540&sh=540&sm=fit',
                'description' => 'This multidimensional highlighter suspends ultra-fine rose, silver, and gold Japanese pearls in a cushiony, transparent base that melds seamlessly with every skin tone. Its revolutionary texture ensures that this highlighter stays put for 12 hours without caking and can be easily layered over eye, lip, or cheek products without compromising color or adding weight. Available in three radiant shades inspired by Tokyo’s gleaming lights, customizing your glow is easier than ever. Dermatologist and ophthalmologist-tested.',
                'overview' => 'This multi-use highlighter transforms and illuminates the skin with a breathable, formula that feels invisible and lasts for 12 hours.',
                'brand' => 'Shiseido'
            ],
            ['name' => 'ModernMatte Powder Lipstick',
                'price'=> '400.000',
                'images'=> 'https://www.shiseido.com/dw/image/v2/BBSK_PRD/on/demandware.static/-/Sites-itemmaster_shiseido/default/dwc0a30411/images/hi-res/0729238147928.jpg?sw=540&sh=540&sm=fit',
                'description' => 'This non-drying formula delivers matte, full-coverage color that feels utterly weightless and provides a powder-soft finish on lips. A unique blend of waxes and oils melts and transforms into an ultra-thin, featherweight powder, while spherical pigments float across lips to blur imperfections. Available in 24 shades inspired by Tokyo’s vibrant nightlife, this statement-making lipstick provides eight hours of rich, velvety color. Dermatologist-tested.',
                'overview' => 'A weightless, full-coverage, matte lipstick that lends lips long-lasting, velvety color.',
                'brand' => 'Shiseido'
            ],
            ['name' => 'LacquerInk LipShine ',
                'price'=> '400.000',
                'images'=> 'https://www.shiseido.com/dw/image/v2/BBSK_PRD/on/demandware.static/-/Sites-itemmaster_shiseido/default/dw281d47f7/images/alt1/0730852148260-main.jpg?sw=540&sh=540&sm=fit',
                'description' => 'The unique blend of oils in this hybrid formula offers the shine and comfort of a gloss, while smoothing polymers provide the durable, hydrating color of a lipstick. A custom, concave applicator hugs the contours of the mouth and dispenses the perfect amount of pigment that can be worn alone or layered over other lip products for extra dimension and sheen. Available in 12 shades, this full-coverage fluid deposits inky color with a vivid, vinyl finish. Dermatologist-tested.',
                'overview' => 'The high-intensity pigment meets the luminosity of a gloss in this featherweight formula that never leaves lips feeling dry or sticky.',
                'brand' => 'Shiseido'
            ],
            ['name' => 'Protective Lip Conditioner SPF 12',
                'price'=> '400.000',
                'images'=> 'https://www.shiseido.com/dw/image/v2/BBSK_PRD/on/demandware.static/-/Sites-itemmaster_shiseido/default/dw6d7a8638/images/hi-res/0730852143463_A1.jpg?sw=540&sh=540&sm=fit',
                'description' => 'A daily treatment that delivers concentrated moisture, visibly smooth texture and radiance to lips while protecting against UV rays. This powerful formula hydrates and conditions dry chapped lips on contact and helps defend skin against the damage of harsh environments and climatic extremes. Smooth, light texture leaves lips feeling soft, smooth and comfortable.',
                'overview' => 'Daily mositurizing lip treatment with UV Protection.',
                'brand' => 'Shiseido'
            ],
            ['name' => 'Full Correction Lip Treatment',
                'price'=> '400.000',
                'images'=> 'https://www.shiseido.com/dw/image/v2/BBSK_PRD/on/demandware.static/-/Sites-itemmaster_shiseido/default/dw301e8603/images/hi-res/0730852191082_Main.jpg?sw=540&sh=540&sm=fit',
                'description' => 'A rich nourishing balm that enhances lip contours and gives lips a plumped look while promoting a beautifully lustrous, smooth texture.',
                'overview' => 'A rich nourishing balm that enhances lip contours and gives lips a plumped look.',
                'brand' => 'Shiseido'
            ],
            ['name' => 'Rouge Rouge ',
                'price'=> '400.000',
                'images'=> 'https://www.shiseido.com/dw/image/v2/BBSK_PRD/on/demandware.static/-/Sites-itemmaster_shiseido/default/dw3a75dd2a/images/hi-res/0729238134799_A1.jpg?sw=540&sh=540&sm=fit',
                'description' => 'Envelop lips in vibrant red color, lasting luster and rich moisture. Using Vibrant Red Color Technology, Shiseido has exclusively developed twenty-four of the most flattering shades-nuanced, intense, unforgettable with a red for everyone.',
                'overview' => 'Envelop lips in vibrant red color.',
                'brand' => 'Shiseido'
            ],
            ['name' => 'LacquerInk LipShine ',
                'price'=> '400.000',
                'images'=> 'https://www.nyxcosmetics.com/dw/image/v2/AANG_PRD/on/demandware.static/-/Sites-cpd-nyxusa-master-catalog/default/dw5bf65cb3/ProductImages/2018/Lips/Suede_Matte_Lipstick/suedemattelipstick_main.jpg?sw=420&sh=420&sm=fit&q=70',
                'description' => 'Got a serious crush on Suede Matte Lip Liner? Then you’re about to fall head over heels for Suede Matte Lipstick, our all-new formula inspired by those velvety pencils. Featuring an adorable heart-adorned case, this super-soft and lightweight lipstick covers your pout in powdery-matte color. Pair all 24 plush shades with their matching lip liners for a look you’ll heart.',
                'overview' => 'Then you’re about to fall head over heels for Suede Matte Lipstick.',
                'brand' => 'NYX'
            ],
            ['name' => 'Powder Puff Lippie Lip Cream ',
                'price'=> '400.000',
                'images'=> 'https://www.nyxcosmetics.com/dw/image/v2/AANG_PRD/on/demandware.static/-/Sites-cpd-nyxusa-master-catalog/default/dw481c25c3/ProductImages/2018/Lips/Powder_Puff_Lippie/powderpufflippie_main.jpg?sw=420&sh=420&sm=fit&q=70',
                'description' => 'Pucker up and powder your pout! Featuring a pillowy cushion-applicator, our new Powder Puff Lippie Powder Lip Cream goes on mousse-y and sets to a powdery soft finish. Achieve a flush of color in eight vibrant shades—from warm peach to true red, and hot pink to cool plum—for an irresistible, just-kissed look. ',
                'overview' => 'Pucker up and powder your pout!',
                'brand' => 'NYX'
            ],
            ['name' => 'Liquid Suede Metallic Matte  ',
                'price'=> '400.000',
                'images'=> 'https://www.nyxcosmetics.com/dw/image/v2/AANG_PRD/on/demandware.static/-/Sites-cpd-nyxusa-master-catalog/default/dw9d2f72a4/ProductImages/2017/Lips/Liquid_Suede_Metallic_Matte/liquidsuedemetallicmatte_main.jpg?sw=195&sh=195&sm=fit&q=70',
                'description' => 'Wrap your lips in high-impact metallic color with Liquid Suede Metallic Matte, a striking new lip inspired by our best-selling Liquid Suede Cream Lipstick. Available in 12 statement-making shades, these shockingly creamy lippies deliver instant dimension and incredible color payoff. In other words, get ready to slay.',
                'overview' => 'Wrap your lips in high-impact metallic color with Liquid Suede Metallic Matte',
                'brand' => 'NYX'
            ],
            ['name' => 'Lip Lingerie ',
                'price'=> '400.000',
                'images'=> 'https://www.nyxcosmetics.com/dw/image/v2/AANG_PRD/on/demandware.static/-/Sites-cpd-nyxusa-master-catalog/default/dw00c7446b/ProductImages/2017/Lips/Lip_Lingerie_Extension/liplingerie_main.jpg?sw=195&sh=195&sm=fit&q=70',
                'description' => 'Slip into something seductive with Lip Lingerie, our luxurious liquid lipstick with a plush, Matte finish. Available in the color-kissed hues you know and love—from cinnamon pink and chocolate brown, to warm mahogany red and classic nude beige—plus, 12 brand-new nudes! Each sultry shade will coat the curves of your lips with irresistibly creamy color. ',
                'overview' => 'Slip into something seductive with Lip Lingerie.',
                'brand' => 'NYX'
            ],
            ['name' => 'Super Cliquey Matte Lipstick ',
                'price'=> '400.000',
                'images'=> 'https://www.nyxcosmetics.com/dw/image/v2/AANG_PRD/on/demandware.static/-/Sites-cpd-nyxusa-master-catalog/default/dw6dcbd51c/ProductImages/2017/Lips/Super_Cliquey_Satin_Matte_Lipstick/supercliqueysatinmattelipstick_main.jpg?sw=195&sh=195&sm=fit&q=70',
                'description' => 'Raise your squad goals with Super Cliquey Matte Lipstick! Our beyond creamy bestie comes in 12 richly pigmented shades that leave lips with a satin-matte finish. Featuring a super-soft teardrop-shaped bullet that hugs your lips, this lippie also makes it easy for you to precisely line that pretty pout. Need a little more lip color? Give the clicker a push to dispense the perfect amount of lipstick.',
                'overview' => 'Raise your squad goals with Super Cliquey Matte Lipstick!.',
                'brand' => 'NYX'
            ],
            ['name' => 'Pin-Up Pout Lipstick',
                'price'=> '400.000',
                'images'=> 'https://www.nyxcosmetics.com/dw/image/v2/AANG_PRD/on/demandware.static/-/Sites-cpd-nyxusa-master-catalog/default/dw5c89147f/ProductImages/2017/Lips/Pin_Up_Pout_Lipstick/pinuppoutlipstick_main.jpg?sw=195&sh=195&sm=fit&q=70',
                'description' => 'From polka dots to pointy pumps, nothing compares to the classics. Our personal fave? Ever so creamy lip color, of course! Take yourself back to the signature lip that started it all with our Pin-Up Pout Lipstick. Inspired by the best of vintage beauty, this retro rouge covers lips in extra plush, richly pigmented and absolutely undeniable color. Our throwback lipstick also offers beautiful coverage in an array of 24 swoon-worthy shades.',
                'overview' => 'From polka dots to pointy pumps, nothing compares to the classics.',
                'brand' => 'NYX'
            ],
            ['name' => 'LacquerInk LipShine ',
                'price'=> '400.000',
                'images'=> 'https://www.nyxcosmetics.com/dw/image/v2/AANG_PRD/on/demandware.static/-/Sites-cpd-nyxusa-master-catalog/default/dw1e94f54f/ProductImages/2016/Lips/Velvet_Matte_Lipstick/velvetmattelipstick_main.jpg?sw=195&sh=195&sm=fit&q=70',
                'description' => 'Dress your lips in decadent color with our Velvet Matte Lipstick--a luxurious new lip color that glides right on and never feels dry. Housed in an elegant soft-touch case, each standout shade is a fashion statement in itself. ',
                'overview' => 'Dress your lips in decadent color with our Velvet Matte Lipstick.',
                'brand' => 'NYX'
            ],
            ['name' => 'Plush Gel Lipstick ',
                'price'=> '400.000',
                'images'=> 'https://www.nyxcosmetics.com/dw/image/v2/AANG_PRD/on/demandware.static/-/Sites-cpd-nyxusa-master-catalog/default/dw9c3f0820/ProductImages/2016/Lips/Plush_Gel_Lipstick/plushgellipstick_main.jpg?sw=195&sh=195&sm=fit&q=70',
                'description' => 'Play up your pout with a silky stroke of Plush Gel Lipstick. Available in 12 totally vibrant shades, this lippie brings together an oh-so-soft feel and the high shine of a gloss. Drench lips in a wash of color for an instantly polished look anytime you crave a quick touch-up. Want a bolder finish? (Yes, please!) A second swipe is twice as nice.',
                'overview' => 'Play up your pout with a silky stroke of Plush Gel Lipstick.',
                'brand' => 'NYX'
            ],
            ['name' => 'Butter Lipstick ',
                'price'=> '400.000',
                'images'=> 'https://www.nyxcosmetics.com/dw/image/v2/AANG_PRD/on/demandware.static/-/Sites-cpd-nyxusa-master-catalog/default/dwf73b3195/ProductImages/2016/Lips/Butter_Lipstick_Extension/butterlipstick_main.jpg?sw=195&sh=195&sm=fit&q=70',
                'description' => 'Treat your lips to a kiss of smooth, creamy color with our irresistible Butter Lipsticks in 12 new luscious shades. The formula’s delicate satin texture fused with highly saturated color delivers full-yet-lightweight coverage with a luxurious satin finish. ',
                'overview' => 'Treat your lips to a kiss of smooth, creamy color with our irresistible Butter Lipsticks in 12 new luscious shades.',
                'brand' => 'NYX'
            ],
            ['name' => 'Simply Vamp Lip Cream ',
                'price'=> '400.000',
                'images'=> 'https://www.nyxcosmetics.com/dw/image/v2/AANG_PRD/on/demandware.static/-/Sites-cpd-nyxusa-master-catalog/default/dw48514b30/ProductImages/Lips/Simply_Vamp_Lip_Cream/simplyvamplipcream_main.jpg?sw=195&sh=195&sm=fit&q=70',
                'description' => 'Vamp up your look instantly with our smooth and smoldering lip creams. Wear any of these six bewitching shades to brew up a little beauty magic.',
                'overview' => 'Vamp up your look instantly with our smooth and smoldering lip creams. ',
                'brand' => 'NYX'
            ],
            ['name' => 'Whipped Lip & Cheek Soufflé  ',
                'price'=> '400.000',
                'images'=> 'https://www.nyxcosmetics.com/dw/image/v2/AANG_PRD/on/demandware.static/-/Sites-cpd-nyxusa-master-catalog/default/dw5e28f1e5/ProductImages/Lips/Whipped_Lip_And_Cheek_Souffle/whippedlipandcheeksouffle_alt1.jpg?sw=195&sh=195&sm=fit&q=70',
                'description' => 'Indulge your cravings with our Whipped Lip & Cheek Soufflé. Our two-in-one mousse can be used to precisely line lips and on the apples of your cheeks for a soft, natural flush. Achieve a delicious wash of color with a matte finish using this creamy and multipurpose formula. ',
                'overview' => 'Indulge your cravings with our Whipped Lip & Cheek Soufflé.',
                'brand' => 'NYX'
            ],
        ]);

    }
}
