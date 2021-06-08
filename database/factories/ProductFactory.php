<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    protected $model = Product::class;

    public function definition()
    {
        return [
            'category_id' => 1,
            'name'        => $this->faker->name,
            'description' => $this->faker->name(),
        ];
    }
}
