<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Ticket;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Note>
 */
class NoteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {


        return [
            'body' => $this->faker->paragraph(3),
            'ticket_id' => Ticket::inRandomOrder()->first()->id,
            'created_by' => User::where('admin', 1)->inRandomOrder()->first()->id
        ];
    }
}
