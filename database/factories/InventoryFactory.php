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
            'ProductCode'=>$this->faker->unique()->randomNumber(),
            'ProductName'=> $this->faker->userName(),
            'EntryDate'=> $this->faker->date(),
            'ExpirationDate'=> $this->faker->date(),
            'ProductPurchasePrice'=> $this->faker->randomFloat($nbMaxDecimals = NULL, $min = 50000, $max = NULL),
            'ProductCategory'=> $this->faker->randomElement(['Alimentos','Arena gato','Farmacia','Peluqueria','Accesorios','Mobiliario']),
            'ProductProfit'=> $this->faker->randomFloat($nbMaxDecimals = NULL, $min = 50000, $max = NULL),
            'InventoryStock'=> $this->faker->randomNumber(),
            'ProductPrice'=> $this->faker->randomFloat($nbMaxDecimals = NULL, $min = 50000, $max = NULL),
            'ProductImage'=> $this->faker->imageUrl(),
        ];
    }
}
