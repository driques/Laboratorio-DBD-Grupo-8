<?php

namespace Database\Factories;

use App\Models\Country;
use App\Models\Rol;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
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
            'password' =>$this->faker->password,
            'plan' =>  $this->faker->boolean,
            'birth_year' => $this->faker->date($format = 'Y-m-d', $max = 'now'),
            'borrado' => $this->faker->boolean,
            'id_pais' => Country::all()->random()->id,
            'id_rol' => Rol::all()->random()->id
        ];
    }
}
