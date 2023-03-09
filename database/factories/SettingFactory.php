<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Setting>
 */
class SettingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'group' => 'env',
            'setname' => fake()->unique()->randomElement(['nama_aplikasi', 'deskripsi_app', 'icon', 'tahun', 'contact', 'biaya_admin']),
            'value' => fake()->sentence(),
        ];
    }
}
