<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(10)->create();

        $settings = [
            [
                'group' => 'env',
                'setname' => 'nama_aplikasi',
                'value' => 'Gakuensai'
            ],
            [
                'group' => 'env',
                'setname' => 'deskripsi_app',
                'value' => 'Japan Festival, Expo, & Competition'
            ],
            [
                'group' => 'env',
                'setname' => 'icon',
                'value' => 'blabla'
            ],
            [
                'group' => 'env',
                'setname' => 'tahun',
                'value' => '2023'
            ],
            [
                'group' => 'env',
                'setname' => 'contact',
                'value' => '081354000500'
            ],
            [
                'group' => 'env',
                'setname' => 'biaya_admin',
                'value' => '5000'
            ]
        ];

        foreach ($settings as $setting) {
            Setting::create($setting);
        }
    }
}
