<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KelasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Model\Kelas::create([
            'kode_kelas' => 'XII-RPL-1',
            'nama_kelas' => 'XII RPL 1'
        ]);

        \App\Models\Model\Kelas::create([
            'kode_kelas' => 'XII-RPL-2',
            'nama_kelas' => 'XII RPL 2'
        ]);

        \App\Models\Model\Kelas::create([
            'kode_kelas' => 'XII-RPL-3',
            'nama_kelas' => 'XII RPL 3'
        ]);
    }
}
