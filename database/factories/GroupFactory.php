<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Group; // Asegúrate de que la ruta sea correcta

class GroupFactory extends Factory
{
    // Indica el modelo que esta fábrica está asociada
    protected $model = Group::class;

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
