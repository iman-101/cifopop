<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class AnuncioFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            
            'titulo'=>$this->faker->sentence,
            'descripcion'=>$this->faker->paragraph,
            'precio'=>$this->faker->randomFloat(20, 300),
        ];
    }
}
