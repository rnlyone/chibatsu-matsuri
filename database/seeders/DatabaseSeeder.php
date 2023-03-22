<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Setting;
use App\Models\Ticket;
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

        Setting::create([
            'group' => 'env',
            'setname' => 'nama_aplikasi',
            'value' => 'Gakuensai'
        ]);

        Setting::create([
            'group' => 'env',
            'setname' => 'deskripsi_app',
            'value' => 'Festival, Expo, & Competition'
        ]);

        Setting::create([
            'group' => 'env',
            'setname' => 'icon',
            'value' => 'blabla'
        ]);

        Setting::create([
            'group' => 'env',
            'setname' => 'tahun',
            'value' => 2023
        ]);

        Setting::create([
            'group' => 'env',
            'setname' => 'contact',
            'value' => '081354000500'
        ]);

        Setting::create([
            'group' => 'env',
            'setname' => 'biaya_admin',
            'value' => 500
        ]);

        Setting::create([
            'group' => 'visibility',
            'setname' => 'story',
            'value' => 1
        ]);

        Setting::create([
            'group' => 'visibility',
            'setname' => 'slider',
            'value' => 1
        ]);

        Setting::create([
            'group' => 'visibility',
            'setname' => 'supports',
            'value' => 1
        ]);

        Setting::create([
            'group' => 'visibility',
            'setname' => 'blog',
            'value' => 0
        ]);

        Setting::create([
            'group' => 'cast',
            'setname' => 'livelink',
            'value' => 'https://livepeercdn.studio/hls/ce56ni0ehgnorws9/index.m3u8'
        ]);

        Ticket::factory(5)->create();
    }
}
