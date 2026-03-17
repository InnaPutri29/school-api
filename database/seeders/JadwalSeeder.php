<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JadwalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Jadwal::create([
            'kelas_id' => 1,
            'mapel_id' => 1,
            'guru_id' => 1,
            'hari' => 'Senin',
            'jam_pelajaran' => '07:30:00',
        ]);

        \App\Models\Jadwal::create([
            'kelas_id' => 1,
            'mapel_id' => 2,
            'guru_id' => 1,
            'hari' => 'Selasa',
            'jam_pelajaran' => '09:00:00'
        ]);
    }
}
