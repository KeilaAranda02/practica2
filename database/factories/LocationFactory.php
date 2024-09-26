<?php

namespace Database\Factories;

use App\Models\Location;
use Illuminate\Database\Eloquent\Factories\Factory;

class LocationFactory extends Factory
{
    /**
     * El nombre del modelo correspondiente a esta fábrica.
     *
     * @var string
     */
    protected $model = Location::class;

    /**
     * Define el estado por defecto del modelo.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'country' => $this->faker->country,
        ];
    }
}
