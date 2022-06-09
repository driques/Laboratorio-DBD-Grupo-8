<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Playlist>
 */
class PlaylistFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nombre_playlist' => $this->faker->lastName,
            'likes_playlist' => $this->faker->numberBetween($min = 0, $max = 1000000),
            'playlist_creator' => User::all()->random()->id,
            'borrado' => $this->faker->boolean
        ];
    }
}
