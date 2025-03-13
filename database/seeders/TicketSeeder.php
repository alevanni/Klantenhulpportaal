<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Ticket;
use App\Models\Category;

class TicketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = Category::all();
        $tickets = Ticket::factory()->count(100)->create();

        $tickets->each(function ($tickets) use ($categories) {
            $tickets->categories()->attach(
                $categories->random(rand(0, 3))->pluck('id')->toArray()
            );
        });
    }
}
