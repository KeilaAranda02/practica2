<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Group;
use App\Models\Level;
use App\Models\Profile;
use App\Models\Location;
use App\Models\Image;
use App\Models\Category;
use App\Models\Tag;
use App\Models\Post;
use App\Models\Video;
use App\Models\Comment;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {
        // Sembrar grupos
        Group::factory(3)->create();

        // Crear los niveles una vez
        $levels = ['Oro', 'Plata', 'Bronce'];
        foreach ($levels as $level) {
            Level::create(['name' => $level]);
        }

        // Sembrar usuarios con perfiles y otros datos relacionados
        User::factory(5)->create()->each(function ($user) use ($levels) {
            $profile = $user->profile()->save(Profile::factory()->make());
            $profile->location()->save(Location::factory()->make());

            // Asignar un nivel aleatorio
            $randomLevel = Level::where('name', $levels[array_rand($levels)])->first();
            $user->level()->associate($randomLevel);
            $user->save();

            $user->groups()->attach($this->array(rand(1, 3)));

            $user->image()->save(Image::factory()->make([
                'url' => 'https://lorempixel.com/90/90/'
            ]));
        });

        // Sembrar categorías
        Category::factory(5)->create();

        // Sembrar etiquetas
        Tag::factory(12)->create();

        // Sembrar publicaciones con imágenes y comentarios
        Post::factory(40)->create()->each(function ($post) {
            $post->image()->save(Image::factory()->make());
            $post->tags()->attach($this->array(rand(1, 12)));

            $number_comments = rand(1, 6);

            for ($i = 0; $i < $number_comments; $i++) {
                $post->comments()->save(Comment::factory()->make());
            }
        });

        // Sembrar videos con imágenes y comentarios
        Video::factory(40)->create()->each(function ($video) {
            $video->image()->save(Image::factory()->make());
            $video->tags()->attach($this->array(rand(1, 12)));

            $number_comments = rand(1, 6);

            for ($i = 0; $i < $number_comments; $i++) {
                $video->comments()->save(Comment::factory()->make());
            }
        });
    }

    /**
     * Crea un array con valores del 1 al máximo especificado.
     *
     * @param int $max
     * @return array
     */
    public function array($max)
    {
        $values = [];

        for ($i = 1; $i <= $max; $i++) {
            $values[] = $i;
        }

        return $values;
    }
}
