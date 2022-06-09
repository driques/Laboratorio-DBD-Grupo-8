<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Follow_user>
 */
class Follow_userFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'follower' => User::all()->random()->id,
            'following' => User::all()->random()->id,
            'borrado' => $this->faker->boolean
        ];
    }
}
