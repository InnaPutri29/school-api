<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class GuruCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            // 1. Tautan ke halaman ini sendiri
            'href' => route('guru.index'),

            // 2. Data utama: Menggunakan GuruResource untuk setiap item di koleksi
            // Ini akan menghasilkan array 'items' yang berisi data guru + links masing-masing
            'items' => GuruResource::collection($this->collection),

            // 3. Tautan navigasi level koleksi
            'links' => [
                [
                    'rel'  => 'self',
                    'href' => route('guru.index')
                ]
            ],

            // 4. Queries: Dokumentasi cara mencari data guru
            'queries' => [
                [
                    'rel'    => 'search',
                    'href'   => route('guru.index'),
                    'prompt' => 'Cari Guru berdasarkan Nama atau NIP',
                    'data'   => [
                        ['name' => 'nama', 'value' => ''],
                        ['name' => 'nip', 'value' => '']
                    ]
                ]
            ],

            // 5. Template: Blueprint untuk membuat data guru baru (POST)
            'template' => [
                'data' => [
                    ['name' => 'user_id', 'value' => '', 'prompt' => 'ID User akun sistem (Wajib)'],
                    ['name' => 'nip', 'value' => '', 'prompt' => 'NIP (Nomor Induk Pegawai)'],
                    ['name' => 'nama', 'value' => '', 'prompt' => 'Nama Lengkap beserta gelar (Wajib)'],
                    ['name' => 'gender', 'value' => '', 'prompt' => 'Jenis Kelamin (laki-laki / perempuan) (Wajib)'],
                    ['name' => 'email', 'value' => '', 'prompt' => 'Alamat Email aktif (Wajib)'],
                    ['name' => 'tempat_lahir', 'value' => '', 'prompt' => 'Tempat Lahir'],
                    ['name' => 'tgl_lahir', 'value' => '', 'prompt' => 'Tanggal Lahir (Format: YYYY-MM-DD)'],
                    ['name' => 'phone_number', 'value' => '', 'prompt' => 'Nomor Telepon/HP'],
                    ['name' => 'alamat', 'value' => '', 'prompt' => 'Alamat Lengkap'],
                    ['name' => 'pendidikan', 'value' => '', 'prompt' => 'Pendidikan Terakhir']
                ]
            ]
        ];
    }
}