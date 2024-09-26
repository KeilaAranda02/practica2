<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * El nombre del modelo correspondiente a esta fábrica.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define el estado por defecto del modelo.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->sentence,
            'category_id' => rand(1, 5), // O puedes usar $this->faker->numberBetween(1, 5)
            'user_id' => rand(1, 5),     // O puedes usar $this->faker->numberBetween(1, 5)
        ];
    }
}
