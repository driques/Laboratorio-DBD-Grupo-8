<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Country;
use App\Models\Song;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class CountrySongRestrictionFactory extends Factory
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
            'id_country' => Country::all()->random()->id,
            'borrado' => $this->faker->boolean
            //
        ];
    }
}
