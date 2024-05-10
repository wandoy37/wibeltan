<?php

namespace Database\Seeders;

use App\Models\Materi;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MateriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Materi::create([
            'nama' => 'Pembelajaran Budidaya Tanaman Kangkung',
            'volume' => '1',
            'satuan' => 'orang',
            'harga' => '5000'
        ]);

        Materi::create([
            'nama' => 'Pembelajaran Budidaya Tanaman Cabai/Tomat',
            'volume' => '1',
            'satuan' => 'orang',
            'harga' => '10000'
        ]);

        Materi::create([
            'nama' => 'Pembelajaran Ternak Sapi dan Pengolahan Pupuk Organik',
            'volume' => '1',
            'satuan' => 'orang',
            'harga' => '5000'
        ]);

        Materi::create([
            'nama' => 'Pembelajaran Pengolahan Tanah Menggunakan Alat Mesin Pertanian (Cultivator)',
            'volume' => '1',
            'satuan' => 'orang',
            'harga' => '5000'
        ]);
    }
}
