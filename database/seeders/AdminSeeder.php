<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'type' => 'admin',
            'username' => 'admin',
            'password' => Hash::make('qwe123')
        ]);

        User::create([
            'type' => 'guru',
            'username' => 'budi',
            'password' => Hash::make('qwe123')
        ]);
    }
}
