<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\Wallet;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class RecurringTransferFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'source_id' => Wallet::inRandomOrder()->first()->id,
            'target_id' => Wallet::inRandomOrder()->first()->id,
            'start_date' => now(),
            'end_date' => now()->addMonths(fake()->numberBetween(1, 12)),
            'frequency' => fake()->numberBetween(1, 20),
            'amount' => fake()->numberBetween(1, 10000),
            'reason' => fake()->string(),
        ];
    }
}
