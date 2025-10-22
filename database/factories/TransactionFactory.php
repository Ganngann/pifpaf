<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Ad;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Transaction>
 */
class TransactionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'ad_id' => Ad::factory(),
            'buyer_id' => User::factory(),
            'seller_id' => User::factory(),
            'amount' => $this->faker->numberBetween(10, 1000),
            'status' => 'completed',
        ];
    }
}
