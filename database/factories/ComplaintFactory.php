<?php

namespace Database\Factories;

use App\Models\Branch;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Complaint>
 */
class ComplaintFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence,
            'message' => $this->faker->paragraphs(5, true),
            'reviewed' => now(),
            'user_id' => User::factory(),
            'branch_id' => Branch::factory(),
        ];
    }

    public function notReviewed(): static
    {
        return $this->state(function (array $attributes) {
            return [
                'reviewed' => null,
            ];
        });
    }
}
