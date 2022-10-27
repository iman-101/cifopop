<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Anuncio;

class AnuncioFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = Anuncio::class;
    
    public function definition()
    {
        return [
            
            'titulo'=>$this->faker->sentence,
            'descripcion'=>$this->faker->paragraph,
            'precio'=>$this->faker->randomFloat(20, 300),
            'imagen'=>$this->faker->image
        ];
    }
}
