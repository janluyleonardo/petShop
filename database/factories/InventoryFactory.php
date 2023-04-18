<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class InventoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'ProductCode' => $this->faker->unique()->randomNumber(),
            'ProductName' => $this->faker->userName(),
            'ProductDescription' => $this->faker->sentence(),
            'PurchaseDate' => $this->faker->date(),
            'ExpirationDate' => $this->faker->date(),
            'InventoryStock' => $this->faker->randomNumber(),
            'ProductPrice' => $this->faker->randomFloat($nbMaxDecimals = NULL, $min = 50000, $max = NULL),
        ];
    }
}
