<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MapelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Kelas::create([
            'kode_kelas' => 'X-MIPA-1',
            'nama_kelas' => 'X MIPA 1'
        ]);

        \App\Models\Kelas::create([
            'kode_kelas' => 'XI-IPS-1',
            'nama_kelas' => 'XI IPS 1'
        ]);
        \App\Models\Kelas::create([
            'kode_kelas' => 'XII-Bahasa',
            'nama_kelas' => 'XII Bahasa'
        ]);
    }
}
