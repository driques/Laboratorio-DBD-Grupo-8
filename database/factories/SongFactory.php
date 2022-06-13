<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Album;
use App\Models\Genre;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Song>
 */
class SongFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nombre_cancion' => $this->faker->lastName,
            'likes' => $this->faker->numberBetween($min = 0, $max = 1000000),
            'reproducciones' => $this->faker->numberBetween($min = 0, $max = 1000000),
            'restriccion_etaria' => $this->faker->numberBetween($min = 0, $max = 21),
            'song_duration' => $this->faker->numberBetween($min = 60, $max = 1500),
            'id_album' => Album::all()->random()->id,
            'id_genre' => Genre::all()->random()->id,
            'id_artist' => User::all()->random()->id,
            'borrado' => $this->faker->boolean
        ];
    }
}
