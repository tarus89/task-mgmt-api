<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->unique()->sentence(3),
            'description' => $this->faker->paragraph(),
            'status' => $this->faker->randomElement(['pending', 'completed']),
            'due_date' => $this->faker->dateTimeBetween('+1 days', '+1 year'), // Future date
            'created_at' => now(),
            'updated_at' => now(),
            'user_id' => $this->faker->numberBetween(1, 11), // Random user_id between 1 and 11
        ];
    }
}
