<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Category;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ticket>
 */
class TicketFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        return [
            'title' => $this->faker->sentence(4),
            'description' => $this->faker->paragraph(10),
            'status' => $this->faker->boolean(30),
            'created_by' => User::where('admin', 0)->inRandomOrder()->first()->id,
            'assigned_to' => User::where('admin', 1)->inRandomOrder()->first()->id,
            'category' => Category::inRandomOrder()->first()->id,
        ];
    }
}
