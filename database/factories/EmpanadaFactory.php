<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class EmpanadaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nombre' => $this->faker->randomElement(['Jamon y Queso','Carne','Cheddar y Panceta','Pollo y cebolla']),
            'precio' => $this->faker->numberBetween(100,200)
            
        ];
    }

}
