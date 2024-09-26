<?php

namespace Database\Factories;

use App\Models\Comment; // Asegúrate de usar la ruta correcta del modelo
use Illuminate\Database\Eloquent\Factories\Factory;

class CommentFactory extends Factory
{
    /**
     * El nombre del modelo correspondiente a esta fábrica.
     *
     * @var string
     */
    protected $model = Comment::class;

    /**
     * Define el estado por defecto del modelo.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'body' => $this->faker->text,
            'user_id' => rand(1, 5), // O $this->faker->numberBetween(1, 5)
        ];
    }
}
