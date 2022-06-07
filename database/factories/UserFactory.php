<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'email' => $this->faker->safeEmail,
            'password' => $this->faker->password,
            'plan' =>  $this->faker->boolean,
            'birth_year' => $this->faker->date($format = 'Y-m-d', $max = 'now'),
            'borrado'=> $this->faker->boolean()
            //'id_pais' => $this->faker->numberBetween($min = 1, $max = 193),
            //'id_rol' => $this->faker->numberBetween($min = 1, $max = 3)
        ];
    }
}
