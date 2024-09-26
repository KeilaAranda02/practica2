<?php

namespace Database\Factories;

use App\Models\Category; // Asegúrate de usar el namespace correcto
use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    // Indica el modelo que esta fábrica está asociada
    protected $model = Category::class;

    /**
     * Define el estado por defecto de la fábrica.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word, // Usa $this->faker en lugar de $faker
        ];
    }
}
