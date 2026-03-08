<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GuruSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Model\Guru::create([
            'user_id' => 2,
            'nip' => '1234567890',
            'nama' => 'Budi Santoso',
            'tempat_lahir' => 'Jakarta',
            'tgl_lahir' => '1980-01-01',
            'gender' => 'laki-laki',
            'phone_number' => '081234567890',
            'email' => 'budi.santoso@example.com',
            'alamat' => 'Jl. Merdeka No. 123',
            'pendidikan' => 'S1'
        ]);
    }
}
