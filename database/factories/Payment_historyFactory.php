<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Payment_history>
 */
class Payment_historyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            //

            'monto'=>$this->faker->numberBetween($min = 0, $max = 10000),
            'metodo_pago'=>$this->faker->creditCardType(),
            'borrado' => $this->faker->boolean,
            'user_pay' => User::all()->random()->id
            
        ];
    }
}
