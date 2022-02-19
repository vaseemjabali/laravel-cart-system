<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            'name' => 'Samsung Galaxy S9',
            'description' => 'A brand new, sealed Lilac Purple Verizon Global Unlocked Galaxy S9 by Samsung. This is an upgrade. Clean ESN and activation ready.',
            'photo' => 'https://www.addmecart.com/wp-content/uploads/2020/10/R109.jpeg',
            'price' => 698.88
         ]);
 
         DB::table('products')->insert([
             'name' => 'Apple iPhone X',
             'description' => 'GSM & CDMA FACTORY UNLOCKED! WORKS WORLDWIDE! FACTORY UNLOCKED. iPhone x 64gb. iPhone 8 64gb. iPhone 8 64gb. iPhone X with iOS 11.',
             'photo' => 'https://vlebazaar.in/image/cache/catalog/----imagsweb/ipx-550x550.jpeg',
             'price' => 983.00
         ]);
 
         DB::table('products')->insert([
             'name' => 'Google Pixel 2 XL',
             'description' => 'Full Coverage Tempered Glass Screen Protector with Oleophobic coating which minimises reflection & glares.Samsung Galaxy S9',
             'photo' => 'https://vlebazaar.in/image/cache/catalog//B08CD2CFMH/skytree-3d-screen-protector-full-curved-edge-to-edge-protection-tempered-glass-edge-to-edge-full-screen-coverage-for-google-pixel-2-xl-transparent-B08CD2CFMH-550x550h.jpg',
             'price' => 675.00
         ]);
 
         DB::table('products')->insert([
             'name' => 'LG V10 H900',
             'description' => 'NETWORK Technology GSM. Protection Corning Gorilla Glass 4. MISC Colors Space Black, Luxe White, Modern Beige, Ocean Blue, Opal Blue.',
             'photo' => 'https://vlebazaar.in/image/cache/catalog//B0862F8D24/Tuta-Tempered-Glass-with-Nano-tech-Technology-026mm-Highly-Transparency-Matte-Screen-Protector-for-LG-Q6-Pack-of-3-B0862F8D24-550x550.jpg',
             'price' => 159.99
         ]);
 
         DB::table('products')->insert([
             'name' => 'Huawei Elate',
             'description' => 'Airtree Present 9H Hardness HD Clear Tempered Glass Screen Protector for Huwei Honor 7X (Transparent)',
             'photo' => 'https://vlebazaar.in/image/cache/catalog//B07H6YXLK1/Market-Affairs-Present-9H-Hardness-HD-Clear-Tempered-Glass-Screen-Protector-for-Huwei-Honor-7X-Transparent-B07H6YXLK1-550x550h.jpg',
             'price' => 68.00
         ]);
 
         DB::table('products')->insert([
             'name' => 'HTC One M10',
             'description' => 'The device is in good cosmetic condition and will show minor scratches and/or scuff marks.',
             'photo' => 'https://i.ebayimg.com/images/g/u-kAAOSw9p9aXNyf/s-l500.jpg',
             'price' => 129.99
         ]);
    }
}
