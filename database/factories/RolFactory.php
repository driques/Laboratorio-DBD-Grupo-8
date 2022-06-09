<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Rol>
 */
class RolFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'rol'=>$this->faker->numberBetween($min = 0, $max = 2),
<<<<<<< HEAD
            'borrado' => $this->faker->boolean
=======
            'borrado'=>$this->faker->boolean()
>>>>>>> main
        ];
    }
}
