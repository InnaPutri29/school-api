<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Siswa::create([
            'nis' => '1234567890',
            'gender' => 'perempuan',
            'nama' => 'Inna',
            'tempat_lahir' => 'Kuningan',
            'tgl_lahir' => '2005-05-29',
            'nama_ortu' => 'VIvi',
            'phone_number' => '0895380111153',
            'email' => 'inna@example.com',
            'alamat' => 'Kost Putri Alesha',
            'kelas_id' => 1
        ]);
    }
}
