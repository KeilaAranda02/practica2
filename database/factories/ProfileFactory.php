<?php

namespace Database\Factories;

use App\Models\Profile;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProfileFactory extends Factory
{
    // Indica el modelo que esta fábrica está asociada
    protected $model = Profile::class;

    /**
     * Define el estado por defecto de la fábrica.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'instagram' => $this->faker->userName, //  $this->faker en lugar de $faker
            'github'    => $this->faker->userName, 
            'web'       => $this->faker->url,       
        ];
    }
}
