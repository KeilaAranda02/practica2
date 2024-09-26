<?php

namespace Database\Factories;

use App\Models\Image; // Usa la ruta correcta del modelo
use Illuminate\Database\Eloquent\Factories\Factory;

class ImageFactory extends Factory
{
    /**
     * El nombre del modelo correspondiente a esta fábrica.
     *
     * @var string
     */
    protected $model = Image::class;

    /**
     * Define el estado por defecto del modelo.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'url' => $this->faker->imageurl(1024, 1024),
        ];
    }
}
