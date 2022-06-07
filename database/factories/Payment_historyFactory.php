<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

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
            'metodo pago'=>$this->faker->creditCardType(),
            'user_pay'=>$this->faker->numberBetween($min = 0, $max = 100),
<<<<<<< Updated upstream
            'borrado'=> $this->faker->boolean()
=======
            'borrado'=>$this->faker->boolean()
>>>>>>> Stashed changes
            
        ];
    }
}
