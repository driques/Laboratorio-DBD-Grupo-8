<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Song;
use App\Models\Playlist;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Playlist_group>
 */
class Playlist_groupFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'id_cancion' => Song::all()->random()->id,
            'id_playlist' => Playlist::all()->random()->id,
            'borrado' => $this->faker->boolean
        ];
    }
}
