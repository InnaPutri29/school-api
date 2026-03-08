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
        \App\Models\Model\Siswa::create([
            'nis' => '1234567890',
            'gender' => 'laki-laki',
            'nama' => 'Rizal Fadillah',
            'tempat_lahir' => 'Bandung',
            'tgl_lahir' => '2000-01-01',
            'nama_ortu' => 'Fadillah',
            'phone_number' => '081234567890',
            'email' => 'rizal@example.com',
            'alamat' => 'Jl. Merdeka No. 123',
            'kelas_id' => 1
        ]);
    }
}
