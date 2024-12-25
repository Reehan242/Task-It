<?php

namespace Database\Factories;

use App\Models\User;
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
    public function definition()
    {
        return [
            'title' => $this->faker->sentence(),
            'description' => $this->faker->paragraph(),
            'status' => $this->faker->randomElement(['not_start', 'in_progress', 'complete']),
            'user_id' => User::factory(),
            'deadline' => $this->faker->dateTimeBetween('now', '+1 year'), // Deadline antara sekarang hingga 1 bulan ke depan
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
