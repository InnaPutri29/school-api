<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class GuruCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            // 1. href: Tautan permanen ke koleksi Guru
            'href' => route('guru.index'),

            // 2. items: Array data yang otomatis di-format oleh GuruResource (termasuk relasi user)
            'items' => $this->collection,

            // 3. links: Tautan relasi level koleksi
            'links' => [
                [
                    'rel'  => 'self',
                    'href' => route('guru.index')
                ]
            ],

            // 4. queries: Template pencarian data guru
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

            // 5. template: Form kosong untuk memandu pembuatan data guru baru
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