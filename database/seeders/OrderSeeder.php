<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Order;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Order::factory()->count(5)->create(); 

        foreach(Order::all() as $order){
            $product = \App\Models\Product::inRandomOrder()->take(rand(1,30))->pluck('id');
            $order->products()->attach($product, ['quantity' => rand(5, 25)]);
        }
    }
}
