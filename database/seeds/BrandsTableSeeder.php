<?php

use Illuminate\Database\Seeder;

class BrandsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\DB::table('brands')->truncate();
        \Illuminate\Support\Facades\DB::table('brands')->insert([
            [
                'name'=>'Urban Decay',
                'description'=>'Urban Decay (cosmetics) Urban Decay, an American cosmetics brand headquartered in Newport Beach, California, is a subsidiary of French cosmetics company L\'Oréal. Products include lip, eye, and nail colors, as well as other face and body products.',
                'images'=>'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAOEAAADhCAMAAAAJbSJIAAAAllBMVEX///9TLmRQKWHz8PTVzdlLIV38+/zg2eP28/dyV3/q5uxoSnZJHlxRLGNHGlpWLmhdO23KwM+xorhEEFjFuMqmlq6kkq2HbZK3qL59X4pQJ2JKGl5wUH6Jc5Tc1d/l4eeahaO1przOxNOSfJxjQnJ7YYhqSHmFaZG8sMOmk65+aYpbNGuXgKFiP3NEFFjGus0+AFRrTnmdpL5aAAAHeklEQVR4nO2aC3uquBaGkUu4CFaQm8hNEMRS293//+dOuGnAWvd0Zo+j53v7PBURkvVlrSQrAY4DAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAMC/hWLVv6TykJB7G/LHcAM9FxNRFO5tyJ8i1vlAo5/kaX2YSrMgvrcR/wBaLMbaV15SXvkZX2SP7kDBUue7uZqLpzPEVLoDTeVnM36ZP7YbE3XBG4bBS7rb61Kc90Juj4SCKpwZkh5aiXJHG/8ekTTrMHirPUHcmRGoWXuYSv1PUplWyV3t/DGJLi10vtXB182cQCzJaEKzlSiujF4/H8zUNLuzsT+iCtzMVzsdC4cGZioZnSK30esY/GyAl1bRA/rRKmgHk9VWB18InF8Pkopm6FGs5VnibBZ42r0N/stUUfN/u2gVfiacYO5aHwa50E4SRAwXknGSKB3ua+4PUPaNV7R2ROHncj9D0Ii1T5dk6ZIPek8awePlb3YjRXkxrivkuH3qfPJ9X3280YaI2i2FyTHjZK/zom7dz9QfQ75R+HYsy/JlKTaZAf+gHbHlqkJP4imNQs5t+6rk3tfSn3JdYZu2tQotHQr/y1xXGDy9wuf34fMrRJQ+Cs+v8Jx5k2rZJqD6tt1DfI4oJYLitAqNpSm4Ubd64lXfz8iz+NB50YdVfJh1u090gain9KfuS20pg8LF9t7W/oTTQj6I5GH3yagtmpHLdetQY0Z/aBUaC/F2ef9BiL2hEo33tFneit0xFUj8z2BY+KpmE8nGYn1vW39K9klXENZwHPBLnx6Qj3xu9CtfPqj5IFi+Pd4Sf0BUS3vYvY+9uuqOibwt+l0aQyojN3vcfWHa5Zite415VCFYddMxg9rRlEd/gHENLQ2MwJPvbcafhLjB/PH2Sf8SimPe2wQAAAB/E0IUyhPkGyIlaydeEov0b5Ck2G6aHvytH7MiE9O0KR/xZSapXTzIlW3b7FNqktG7Js+XEtOubNM0RXlcWHttRzVJeTRau/lV3SZzjsS0VDtu0l9aesb5+2WZJl3J6+XaHy4l2vZXIQtyvnQYifL2GLixmOXedEFHUvWiXicw8qHWtxd3cotmh7ory2L15llsbkMSe17nzuFwcI+jR1KKs/fF2I4Kf5oK+Uv2zRX5TQr9RpKWHSNaqRmcipGPbJsJm6iRq65G1VSrqrEiX02aNzmuLlexIf/u9u2jhJcP652V337G+43FOoZERufvzGHOamXeRYQtTXIh4XXhjLpT0StO1k1bmMFpB0Fbs1b0Cv3FyDnme9UKXbCVU7Z1kF5IWOe7mUV6hRdJNhkUcpp3eu2mV9hp0D4Yc6JicJ3LPmflmjXashitMMV635aTt7YyPvxSYRYcv1BoSxOF68Pn54WX1qK/qqvbCjlxYzB+OSnkGM9U5+fEyfhtKuI4eTAKIOKumouzNfkdhbY+2mLoFBJXGhssqoqrV5cKOcfYZLcVciFby6AwZswR1FFDs2hFkun5+JSqatTrnexbCtPFyHBz48qx6HiTQEkdTlxF01GOKiQOPxdvK0yl+uwvEs0qgcK8FMfFL941hWakaGo9rrvaWFyVkpsK6RVJkI/uNfX0w/bX63Fn10LaR8p6KoIq5JR0pco3FToS8zoGiQLV87yCHSHtTXpN4VvVDFrjuYiUZVz0DXRdoT53aYBP9mr7fmitRjucVW1Z23AxNWLd1pHrR+2WwoM+8uGLTWjGwU5J1fs4Dhk7X4ooWkv5ODkR69MI+o0PX7PM4ccuHBRqKjuuKHnuOI67PE5SoE6hkC8ijXyvMNeZEXvohxlzi6lf23G0Czqx2+p8XD4zn2X8d/1QKHh/dGevkEQ108AyvZFQnZNQ6RXSoWCRCt8rLNnZZ1DIviUtL6+8VUSidkpxJuMcLXwQI8+9wUtxyCYL3UgjbuqR2YPCfMacdrtGMvlJqPQKOUVdROq3s8WKndDOs4VwanKSrk5twG7acXE3JWgbbxRsjEKSSk7/WzqKyH4szfWQPXuKUiYqSNgNCZq6G8sYFHJyoX9+o1DwdmwznhVW5wFNDndDaaP9nW0/UKjjcY5RyGlHqX39UXDK0UyqvbcKk/CUebV1tkkcnVKZPCnz+uNUH4f0SSEXl/NLhW6fEAr5cTRhK17QTUbamrkprssudh12VjoNR85qlIOQ9NdZjeDOg9ArwogNdKIdFi9W8ya6OJf6zItm6x/h8mjZ1b44R72QhZ7YWJLEb1JpnwtJrF1kD3Ev76cZj+yU9T6jK5tt7o9ix853u3LfUB5HP1jryP/wI4+xU053Tka/Jxm9icnI5UO588zThSQxK9+UR31I+dhS2lWJKS3tQaHYwS54tGad0zRk3K6szkK0mHKqZPraPpGzLwprhIhnJi+7CzG9elRQQqto7heauph1VTL5/hXk9I/bBhdz+bNh7naP+YDv9xHLXfXID4h+AzmSvCoRnlplnL6+RtZTSwQAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAADwf8T/AKPdjqVEA698AAAAAElFTkSuQmCC'
            ],
            [
                'name'=>'NARS',
                'description'=>'NARS Cosmetics is a French cosmetics and skin care company founded by make-up artist and photographer François Nars in 1994. The cosmetics line began with twelve lipsticks sold at Barneys New York.',
                'images'=>'https://www.spellbrand.com/images/blog/images/NARS-logo-design.jpg'
            ],
            [
                'name'=>'Kylie Cosmetics',
                'description'=>'Kylie Cosmetics is an American cosmetic company founded and owned by Kylie Jenner. Formerly known as Kylie Lip Kits, the company was renamed Kylie Cosmetics in 2016 after the release of the liquid lipstick and lip liner set on November 29, 2015.',
                'images'=>'https://cdn.shopify.com/s/files/1/1133/5964/files/kylie-fb.jpg?14167237933715417285'
            ],
            [
                'name'=>'NYX',
                'description'=>'NYX Cosmetics is a cosmetics company which is a subsidiary of L\'Oréal. The company was founded in Los Angeles by Toni Ko in 1999. it was named after Nyx, the Greek goddess of the night.',
                'images'=>'https://logos-download.com/wp-content/uploads/2016/05/NYX_logo.png'
            ],
            [
                'name'=>'Maybelline',
                'description'=>'Maybelline LLC, branded as Maybelline New York, is a major American makeup brand sold worldwide and a subsidiary of French cosmetics company L\'Oréal.',
                'images'=>'https://botw-pd.s3.amazonaws.com/styles/logo-thumbnail/s3/0004/8973/brand.gif?itok=XoxrV9et'
            ],
            [
                'name'=>'Stila',
                'description'=>'Stila Cosmetics is an American cosmetics company founded in 1994. The cosmetics line was created by makeup artist Jeanine Lobell. The name Stila was derived from the Swedish word "stil," which can mean "style".',
                'images'=>'http://www.warehousesales.com/wp-content/uploads/2017/12/stila-logo.jpg'
            ],
            [
                'name'=>'MAC',
                'description'=> 'MAC Cosmetics, stylized as M·A·C, is a cosmetics manufacturer founded in Toronto in 1984 by Frank Toskan and Frank Angelo. The company is headquartered in New York City and became part of the Estée Lauder Companies in 1998. MAC is an abbreviation for Make-up Art Cosmetics.',
                'images'=>'https://s3-media1.fl.yelpcdn.com/bphoto/j9E8vKLBxLoW-FScuBxxUg/ls.jpg'
            ],
            [
                'name'=>'ColourPop',
                'description'=>'ColourPop Cosmetics, also known as simply ColourPop, is a cosmetic company based in Los Angeles, California. The company was founded in 2014 by siblings Laura and John Nelson.',
                'images'=>'https://static1.squarespace.com/static/5931daa0893fc044fd2fdf12/5931e1575016e169931f1090/59356e0e37c581fea8533ca9/1496854856387/O3AggFem.jpg?format=1000w'
            ],
            [
                'name'=>'Dior',
                'description'=>'Discover all Makeup lines by Christian Dior. Browse expert Makeup advice for your complexion, eyes and lips.',
                'images'=>'https://i0.wp.com/saviings.com/wp-content/uploads/2018/01/Dior-Logo.png?ssl=1'
            ],
            [
                'name'=>'Anastasia Beverly Hills',
                'description'=>'Beauty pioneer, creative visionary and powerhouse entrepreneur Anastasia Soare is Founder, CEO, and driving force behind Anastasia Beverly Hills—one of the fastest-growing brands in the global beauty industry. Soare immigrated to the US from Romania without language skills or financial means; instead she leveraged a fierce resolve and education in art and architecture to fuel her entrepreneurial vision and unique approach to beauty.',
                'images'=>'https://wolvesweekly.files.wordpress.com/2018/02/abh-logo_2000x.png?w=672&h=372&crop=1'
            ],
        ]);
    }
}
