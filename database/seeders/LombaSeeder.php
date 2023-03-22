<?php

namespace Database\Seeders;

use App\Models\Lomba;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LombaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Lomba::create([
            'nama_lomba' => 'J-Song Competition',
            'kuota' => 30,
            'deskripsi' => 'Kompetisi Menyanyi Lagu Jepang',
            'persyaratan' => 'Umum',
            'juknis' => 'http://google.com',
            'biaya' => 25000,
            'level' => 'Regional Kota',
            'visibilitas' => 1,
            'src' => 'profilebanner.png'
        ]);

        Lomba::create([
            'nama_lomba' => 'Cerdas Cermat Jepang',
            'kuota' => 10,
            'deskripsi' => 'Kompetisi Cerdas Cermat Bermateri Budaya Jepang',
            'persyaratan' => 'SMA Sederajat',
            'juknis' => 'http://google.com',
            'biaya' => 30000,
            'level' => 'Regional Provinsi',
            'visibilitas' => 1,
            'src' => 'profilebanner.png'
        ]);

        Lomba::create([
            'nama_lomba' => 'Fanart Competition',
            'kuota' => 100,
            'deskripsi' => 'Kompetisi Fanart Itsukyodai Skala Nasional',
            'persyaratan' => 'Umum',
            'juknis' => 'http://google.com',
            'biaya' => 35000,
            'level' => 'Nasional',
            'visibilitas' => 1,
            'src' => 'profilebanner.png'
        ]);
    }
}
