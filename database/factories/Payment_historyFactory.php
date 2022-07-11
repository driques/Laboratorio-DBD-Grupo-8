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
            'creditCard'=>$this->faker->numberBetween($min = 0, $max = 1000000),
            'cvv'=>$this->faker->numberBetween($min = 100, $max = 999),
            'month'=>$this->faker->numberBetween($min = 0, $max = 12),
            'year'=>$this->faker->numberBetween($min = 20, $max = 30),
            'metodo_pago'=>$this->faker->creditCardType(),
            'cardOwner'=>$this->faker->lastName,
            'user_pay'=>$this->faker->lastName,
            'borrado' => $this->faker->boolean,
            'user_pay' => User::all()->random()->id
            
        ];
    }
}

/*
$table->id();
$table->integer('creditCard');
$table->integer('cvv');
$table->integer('MM');
$table->integer('YY');
$table->string('metodo_pago');
$table->string('cardOwner');

$table->string('user_pay');


$table->boolean('borrado');*/