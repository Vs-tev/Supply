<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            ['name' => 'BACKWAREN',
             'id' => '1'],
            ['name' => 'FLEISCHWAREN',
            'id' => '2'],
            ['name' => 'MILCHPRODUKTE ',
            'id' => '3'],
            ['name' => 'OBST',
            'id' => '4'],
            ['name' => 'GEMUESE',
            'id' => '5'],
            ['name' => 'GEWUERZE',
            'id' => '6'],
            ['name' => 'GETRAENKE',
            'id' => '7'],
            ['name' => 'SONSTIGES',
            'id' => '8'],
        ];

        Category::insert($categories);
    }
}
