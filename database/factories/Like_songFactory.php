<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Song;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Like_song>
 */
class Like_songFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'id_song' => Song::all()->random()->id,
            'user_like' => User::all()->random()->id,
            'borrado' => $this->faker->boolean
        ];
    }
}
