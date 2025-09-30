<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Deposit>
 */
class DepositFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "received_from" => fake()->name(),
            "amount" => fake()->randomFloat(2, 0, 100),
            "remarks" => rand(1, 0) == 1 ? fake()->realText() : null,
            "created_at" => fake()->dateTime()
        ];
    }
}
