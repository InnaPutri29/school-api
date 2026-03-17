<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class SiswaCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'href' => route('siswa.index'),

            'items' => $this->collection,

            'links' => [
                [
                    'rel'  => 'self',
                    'href' => route('siswa.index')
                ]
            ],

            'queries' => [
                [
                    'rel'    => 'search',
                    'href'   => route('siswa.index'),
                    'prompt' => 'Cari Siswa berdasarkan Nama atau NIS',
                    'data'   => [
                        ['name' => 'nama', 'value' => ''],
                        ['name' => 'nis', 'value' => '']
                    ]
                ]
            ],

            'template' => [
                'data' => [
                    ['name' => 'nis', 'value' => '', 'prompt' => 'NIS (Nomor Induk Siswa - Wajib & Unik)'],
                    ['name' => 'gender', 'value' => '', 'prompt' => 'Jenis Kelamin (laki-laki / perempuan) (Wajib)'],
                    ['name' => 'nama', 'value' => '', 'prompt' => 'Nama Lengkap (Wajib)'],
                    ['name' => 'tempat_lahir', 'value' => '', 'prompt' => 'Tempat Lahir'],
                    ['name' => 'tgl_lahir', 'value' => '', 'prompt' => 'Tanggal Lahir (Format: YYYY-MM-DD)'],
                    ['name' => 'nama_ortu', 'value' => '', 'prompt' => 'Nama Orang Tua/Wali'],
                    ['name' => 'phone_number', 'value' => '', 'prompt' => 'Nomor Telepon/HP'],
                    ['name' => 'email', 'value' => '', 'prompt' => 'Alamat Email aktif'],
                    ['name' => 'kelas_id', 'value' => '', 'prompt' => 'ID Kelas (Wajib)'],
                    ['name' => 'alamat', 'value' => '', 'prompt' => 'Alamat Lengkap']
                ]
            ]
        ];
    }
}