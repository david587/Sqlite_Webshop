<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Payment>
 */
class PaymentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            "amount" =>$this->fake()->randomFloat($maxDecimal= 2 , $min = 15, $max =500),
            "amount" =>$this->fake()->dateTimeBetween($startDate= "-1 year", $endDate= "now", $timezone =null),
        ];
    }
}
