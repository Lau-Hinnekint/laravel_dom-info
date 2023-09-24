<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {

        $productTypes= ['Ordinateurs de bureau' ,' Ordinateurs multimédia', 'Ordinateurs portable', 'Ordinateurs gaming', 'Périphériques', 'Ecrans'];

        return [
            'product_type' => $this->faker->randomElement($productTypes),
            'product_name' => $this->faker->words(rand(2,4), true),
            'product_img' => $this->faker->imageUrl(),
            'product_desc' => $this->faker->sentence(),
            'product_price' => random_int(50,500)
        ];
    }
}
