<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'product_photo_path' => '',
            'price' => rand(900, 5000),
            'quantity' => '1',
            'in_stock' => rand(2, 28),
            'available' => true,
            'category_id' => rand(1, 6)
        ];
    }
}
