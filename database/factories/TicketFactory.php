<?php

namespace Database\Factories;

use App\Models\Event;
use Illuminate\Database\Eloquent\Factories\Factory;

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
    public function definition()
    {
        return [
            'nama_tiket' => fake()->randomElement(['Bundle', 'Presale 1', 'Presale 2', 'Reguler']),
            'deskripsi_tiket' => fake()->sentence(),
            'harga' => fake()->randomElement([15000, 10000, 25000, 30000]),
            'harga_coret' => fake()->randomElement([15000, 10000, 25000, 30000]),
            'kuota' => fake()->randomElement([800, 50, 20, 5]),
            'created_at' => now(),
            'updated_at' => now()
        ];
    }
}
