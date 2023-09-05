<?php

namespace Database\Factories;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\OrderItem>
 */
class OrderItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [

            'order_id'=>Order::factory()->create()->id,
            'product_id'=>Product::factory()->create()->id,
            'quantity'=>$this->faker->numberBetween(1, 10),
            'item_price'=>$this->faker->numberBetween(100, 1000),
            'subtotal'=>$this->faker->numberBetween(100, 1000),
            'created_at'=>now(),
            'updated_at'=>now(),
        ];
    }
}
