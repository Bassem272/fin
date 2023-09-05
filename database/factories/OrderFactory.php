<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [

            'order_number' => $this->faker->unique()->numberBetween(10000, 99999),
            'customer_id' => User::factory()->create()->id,
            'order_date' => $this->faker->dateTime(),
            'order_status' => $this->faker->randomElement(['pending', 'processing', 'completed']),
            'created_at' => $this->faker->dateTime(),
            'updated_at' =>
            $this->faker->dateTime(),
        ];
    }
}
