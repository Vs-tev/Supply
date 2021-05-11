<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\Product::factory(90)->create();
        $products = [
            [
                'name' => 'Brot',
                'description' => 'Volkorn Brot mit kurbis Kerne',
                'product_photo_path' => 'product-photos/brot.jpg',
                'price' => 90,
                'size' => '1 stk',
                'in_stock' => 50,
                'available' => 1,
                'category_id' => 1
            ],

            [
                'name' => 'Broetchen',
                'description' => 'Volkorn Broetchen mit kurbis Kerne',
                'product_photo_path' => 'product-photos/brot.jpg',
                'price' => 90,
                'size' => '1 stk',
                'in_stock' => 50,
                'available' => 1,
                'category_id' => 1
            ],
            [
                'name' => 'Hoernchen',
                'description' => 'Seasam broth mit Butter',
                'product_photo_path' => 'product-photos/brot.jpg',
                'price' => 190,
                'size' => '1 stk',
                'in_stock' => 50,
                'available' => 1,
                'category_id' => 1
            ],
            [
                'name' => 'Kuchen',
                'description' => 'Verschiedene sorte',
                'product_photo_path' => 'product-photos/cinnamon.jpg',
                'price' => 190,
                'size' => '1 stk',
                'in_stock' => 50,
                'available' => 1,
                'category_id' => 1
            ],
            [
                'name' => 'Brezeln',
                'description' => 'Mit oder ohne lauch',
                'product_photo_path' => 'product-photos/brezel.jpg',
                'price' => 90,
                'size' => '1 stk',
                'in_stock' => 50,
                'available' => 1,
                'category_id' => 1
            ],
            [
                'name' => 'Croissants',
                'description' => 'Mit Schokolade oder Vanilia',
                'product_photo_path' => 'product-photos/croissant.jpg',
                'price' => 90,
                'size' => '1 stk',
                'in_stock' => 50,
                'available' => 1,
                'category_id' => 1
            ],
            [
                'name' => 'Plundergebaecke',
                'description' => 'Sweet kuchen',
                'product_photo_path' => 'product-photos/cinnamon.jpg',
                'price' => 190,
                'size' => '1 stk',
                'in_stock' => 50,
                'available' => 1,
                'category_id' => 1
            ],
            [
                'name' => 'Zoepfe',
                'description' => 'Sweet kuchen',
                'product_photo_path' => 'product-photos/cinnamon.jpg',
                'price' => 90,
                'size' => '1 stk',
                'in_stock' => 50,
                'available' => 1,
                'category_id' => 1
            ],

            [
                'name' => 'Rindfleisch',
                'description' => 'Steak Frisch',
                'product_photo_path' => 'product-photos/beef.png',
                'price' => 990,
                'size' => '1 kg',
                'in_stock' => 50,
                'available' => 1,
                'category_id' => 2
            ],
            [
                'name' => 'Gefluegel',
                'description' => 'Hähnchen',
                'product_photo_path' => 'product-photos/chicken.jpg',
                'price' => 490,
                'size' => '1 kg',
                'in_stock' => 50,
                'available' => 1,
                'category_id' => 2
            ],
            [
                'name' => 'Fisch Hecht',
                'description' => 'Tiefkuehl',
                'product_photo_path' => 'product-photos/fish.jpg',
                'price' => 490,
                'size' => '1 kg',
                'in_stock' => 50,
                'available' => 1,
                'category_id' => 2
            ],
            [
                'name' => 'Fisch Zander',
                'description' => 'Tiefkuehl',
                'product_photo_path' => 'product-photos/fish.jpg',
                'price' => 490,
                'size' => '1 kg',
                'in_stock' => 50,
                'available' => 1,
                'category_id' => 2
            ],
            [
                'name' => 'Hackfleish',
                'description' => 'Rinder 60%, Schwein 40%',
                'product_photo_path' => 'product-photos/plate.jpg',
                'price' => 590,
                'size' => '1 kg',
                'in_stock' => 50,
                'available' => 1,
                'category_id' => 2
            ],
            [
                'name' => 'Buttermilch',
                'description' => '3.5 Fett',
                'product_photo_path' => 'product-photos/milk.jpg',
                'price' => 990,
                'size' => '1 liter',
                'in_stock' => 50,
                'available' => 1,
                'category_id' => 3
            ],
            [
                'name' => 'Kefir',
                'description' => '3.5 Fett',
                'product_photo_path' => 'product-photos/milk.jpg',
                'price' => 990,
                'size' => '0.5 liter',
                'in_stock' => 50,
                'available' => 1,
                'category_id' => 3
            ],
            [
                'name' => 'Butter',
                'description' => 'Fein 10% Fet',
                'product_photo_path' => 'product-photos/butter.jpg',
                'price' => 390,
                'size' => '0.250 kg',
                'in_stock' => 50,
                'available' => 1,
                'category_id' => 3
            ],
            [
                'name' => 'Margarine',
                'description' => 'Fein',
                'product_photo_path' => 'product-photos/butter.jpg',
                'price' => 190,
                'size' => '0.5 kg',
                'in_stock' => 50,
                'available' => 1,
                'category_id' => 3
            ],
            [
                'name' => 'Schlagsahne',
                'description' => '3.5 Fett',
                'product_photo_path' => null,
                'price' => 190,
                'size' => '0.5 liter',
                'in_stock' => 50,
                'available' => 1,
                'category_id' => 3
            ],
            [
                'name' => 'Jogurt',
                'description' => '0.1 Fett',
                'product_photo_path' => null,
                'price' => 90,
                'size' => '1 liter',
                'in_stock' => 50,
                'available' => 1,
                'category_id' => 3
            ],
            [
                'name' => 'Bananen',
                'description' => 'Gruen',
                'product_photo_path' => 'product-photos/banana.jpg',
                'price' => 190,
                'size' => '1 kg',
                'in_stock' => 50,
                'available' => 1,
                'category_id' => 4
            ],
            [
                'name' => 'Birne',
                'description' => 'Bio',
                'product_photo_path' => 'product-photos/birne.jpg',
                'price' => 990,
                'size' => '1 kg',
                'in_stock' => 50,
                'available' => 1,
                'category_id' => 4
            ],
            [
                'name' => 'Himbeere',
                'description' => 'Bio ',
                'product_photo_path' => 'product-photos/raspberries.jpg',
                'price' => 390,
                'size' => '1 kg',
                'in_stock' => 50,
                'available' => 1,
                'category_id' => 4
            ],
            [
                'name' => 'Johannisbeere',
                'description' => 'Bio aus Spanien',
                'product_photo_path' => 'product-photos/currans.jpg',
                'price' => 290,
                'size' => '1 kg',
                'in_stock' => 50,
                'available' => 1,
                'category_id' => 4
            ],
            [
                'name' => 'Zitrone',
                'description' => 'Bio Greece',
                'product_photo_path' => 'product-photos/citrone.jpg',
                'price' => 290,
                'size' => '1 kg',
                'in_stock' => 50,
                'available' => 1,
                'category_id' => 4
            ],
            [
                'name' => 'Erdbeere',
                'description' => 'Bio Greece',
                'product_photo_path' => 'product-photos/strawberry.jpg',
                'price' => 490,
                'size' => '1 kg',
                'in_stock' => 50,
                'available' => 1,
                'category_id' => 4
            ],
            [
                'name' => 'Traube',
                'description' => 'Bio, Spania',
                'product_photo_path' => 'product-photos/grapes.png',
                'price' => 490,
                'size' => '1 kg',
                'in_stock' => 50,
                'available' => 1,
                'category_id' => 4
            ],
            [
                'name' => 'Orange',
                'description' => 'Herkunft Argentina',
                'product_photo_path' => 'product-photos/oranges.jpg',
                'price' => 390,
                'size' => '1 kg',
                'in_stock' => 50,
                'available' => 1,
                'category_id' => 4
            ],
            [
                'name' => 'Kirsche',
                'description' => 'Herkunft Deutschland',
                'product_photo_path' => 'product-photos/cherry.jpg',
                'price' => 590,
                'size' => '1 kg',
                'in_stock' => 50,
                'available' => 1,
                'category_id' => 4
            ],
            [
                'name' => 'Tomaten',
                'description' => 'Herkunft Deutschland',
                'product_photo_path' => 'product-photos/tomatoes.jpg',
                'price' => 290,
                'size' => '1 kg',
                'in_stock' => 50,
                'available' => 1,
                'category_id' => 5
            ],

            [
                'name' => 'Paprika',
                'description' => 'Gelb, Herkunft Ungarn',
                'product_photo_path' => 'product-photos/paprika.jpg',
                'price' => 290,
                'size' => '1 kg',
                'in_stock' => 50,
                'available' => 1,
                'category_id' => 5
            ],

            [
                'name' => 'Pilz',
                'description' => 'Herkunft Deutschland',
                'product_photo_path' => 'product-photos/mushrooms.jpg',
                'price' => 290,
                'size' => '1 kg',
                'in_stock' => 50,
                'available' => 1,
                'category_id' => 5
            ],

            [
                'name' => 'Zwiebeln',
                'description' => 'Herkunft Deutschland',
                'product_photo_path' => 'product-photos/onion.jpg',
                'price' => 490,
                'size' => '1 kg',
                'in_stock' => 50,
                'available' => 1,
                'category_id' => 5
            ],

            [
                'name' => 'Schnittlauch',
                'description' => 'Herkunft Deutschland',
                'product_photo_path' => 'product-photos/chives.jpg',
                'price' => 90,
                'size' => '1 stk',
                'in_stock' => 50,
                'available' => 1,
                'category_id' => 5
            ],

            [
                'name' => 'Rettich',
                'description' => 'Herkunft Deutschland',
                'product_photo_path' => null,
                'price' => 190,
                'size' => '1 kg',
                'in_stock' => 50,
                'available' => 1,
                'category_id' => 5
            ],
            [
                'name' => 'Kartoffeln',
                'description' => 'Herkunft Deutschland',
                'product_photo_path' => null,
                'price' => 190,
                'size' => '1 kg',
                'in_stock' => 50,
                'available' => 1,
                'category_id' => 5
            ],
            [
                'name' => 'Gurken',
                'description' => 'Herkunft Deutschland',
                'product_photo_path' => 'product-photos/cucumbers.jpg',
                'price' => 190,
                'size' => '1 kg',
                'in_stock' => 50,
                'available' => 1,
                'category_id' => 5
            ],
            [
                'name' => 'Zucchinis',
                'description' => 'Herkunft Niderland',
                'product_photo_path' => 'product-photos/zuchinni.jpg',
                'price' => 190,
                'size' => '1 kg',
                'in_stock' => 50,
                'available' => 1,
                'category_id' => 5
            ],
            [
                'name' => 'Radischen',
                'description' => 'Herkunft Deutschland',
                'product_photo_path' => null,
                'price' => 190,
                'size' => '0.5 kg',
                'in_stock' => 50,
                'available' => 1,
                'category_id' => 5
            ],
            [
                'name' => 'Salz',
                'description' => '',
                'product_photo_path' => 'product-photos/pepper.jpg',
                'price' => 190,
                'size' => '0.5 kg',
                'in_stock' => 50,
                'available' => 1,
                'category_id' => 6
            ],
            [
                'name' => 'Pefeffer',
                'description' => 'Schwarz 250gr',
                'product_photo_path' => 'product-photos/pepper.jpg',
                'price' => 90,
                'size' => '1 pak',
                'in_stock' => 50,
                'available' => 1,
                'category_id' => 6
            ],
            [
                'name' => 'Basilikum',
                'description' => '250gr',
                'product_photo_path' => 'product-photos/pepper.jpg',
                'price' => 190,
                'size' => '1 pak',
                'in_stock' => 50,
                'available' => 1,
                'category_id' => 6
            ],
            [
                'name' => 'Ingwer',
                'description' => '250gr',
                'product_photo_path' => 'product-photos/pepper.jpg',
                'price' => 190,
                'size' => '1 pak',
                'in_stock' => 50,
                'available' => 1,
                'category_id' => 6
            ],
            [
                'name' => 'Zimt',
                'description' => 'Gross 250gr',
                'product_photo_path' => 'product-photos/pepper.jpg',
                'price' => 190,
                'size' => '1 pak',
                'in_stock' => 50,
                'available' => 1,
                'category_id' => 6
            ],
            [
                'name' => 'Vanillezucker',
                'description' => '50gr',
                'product_photo_path' => 'product-photos/pepper.jpg',
                'price' => 90,
                'size' => '1 * 12stk',
                'in_stock' => 50,
                'available' => 1,
                'category_id' => 6
            ],
            [
                'name' => 'Puderzucker',
                'description' => 'Weiss',
                'product_photo_path' => 'product-photos/pepper.jpg',
                'price' => 190,
                'size' => '1 kg',
                'in_stock' => 50,
                'available' => 1,
                'category_id' => 6
            ],
            [
                'name' => 'Limonade',
                'description' => '1 Liter',
                'product_photo_path' => 'product-photos/Limonade.png',
                'price' => 190,
                'size' => '1 Kiste',
                'in_stock' => 50,
                'available' => 1,
                'category_id' => 7
            ],
            [
                'name' => 'Cola',
                'description' => '0.25 Liter',
                'product_photo_path' => 'product-photos/coca-cola.jpg',
                'price' => 1290,
                'size' => '1 Kiste',
                'in_stock' => 50,
                'available' => 1,
                'category_id' => 7
            ],

            [
                'name' => 'Fanta',
                'description' => '0.25 Liter',
                'product_photo_path' => 'product-photos/fanta.jpg',
                'price' => 1190,
                'size' => '1 Kiste',
                'in_stock' => 50,
                'available' => 1,
                'category_id' => 7
            ],
            [
                'name' => 'Apfelsaft',
                'description' => '1 Liter ',
                'product_photo_path' => null,
                'price' => 190,
                'size' => '6 Pack',
                'in_stock' => 50,
                'available' => 1,
                'category_id' => 7
            ],
            [
                'name' => 'Orangensaft',
                'description' => '1 Liter',
                'product_photo_path' => null,
                'price' => 190,
                'size' => '6 Pack',
                'in_stock' => 50,
                'available' => 1,
                'category_id' => 7
            ],

            [
                'name' => 'Mineralwasser mit Gas',
                'description' => '18 * 0.5 Liter',
                'product_photo_path' => 'product-photos/water.jpg',
                'price' => 190,
                'size' => '1 Kiste',
                'in_stock' => 50,
                'available' => 1,
                'category_id' => 7
            ],

            [
                'name' => 'Sprudel',
                'description' => '18 * 0.5 Liter',
                'product_photo_path' => 'product-photos/water.jpg',
                'price' => 190,
                'size' => '1 Kiste',
                'in_stock' => 50,
                'available' => 1,
                'category_id' => 7
            ],

            [
                'name' => 'Eier',
                'description' => 'karton 10 Eier',
                'product_photo_path' => 'product-photos/eggs.jpg',
                'price' => 190,
                'size' => '1 Karton',
                'in_stock' => 50,
                'available' => 1,
                'category_id' => 8
            ],


            [
                'name' => 'Weizenmehl',
                'description' => 'Typ 500',
                'product_photo_path' => null,
                'price' => 190,
                'size' => '1 kg',
                'in_stock' => 50,
                'available' => 1,
                'category_id' => 8
            ],

            [
                'name' => 'Reismehl',
                'description' => '',
                'product_photo_path' => null,
                'price' => 90,
                'size' => '1 kg',
                'in_stock' => 50,
                'available' => 1,
                'category_id' => 8
            ],

            [
                'name' => 'Reis',
                'description' => 'Langkorn ',
                'product_photo_path' => 'product-photos/rice.jpg',
                'price' => 390,
                'size' => '1 kg',
                'in_stock' => 50,
                'available' => 1,
                'category_id' => 8
            ],

            [
                'name' => 'Chips',
                'description' => 'Mit Paprika',
                'product_photo_path' => 'product-photos/chips.jpg',
                'price' => 90,
                'size' => '1 stk',
                'in_stock' => 50,
                'available' => 1,
                'category_id' => 8
            ],

            [
                'name' => 'Popcorn',
                'description' => 'Salz/Suess',
                'product_photo_path' => 'product-photos/popcorn.jpg',
                'price' => 90,
                'size' => '1 stk',
                'in_stock' => 50,
                'available' => 1,
                'category_id' => 8
            ],
           
        ];

        Product::insert($products);

    }
}
