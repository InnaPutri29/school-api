<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class GuruCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     */
    public function toArray(Request $request): array
    {
        return [
            // 1. Link Utama (HATEOAS)
            'href' => route('guru.index'),

            // 2. Data Utama
            'data' => GuruResource::collection($this->collection),

            // 3. Metadata Pagination (Sudah di-fix agar tidak muncul koma)
            'meta' => [
                'total'        => (int) $this->total(),
                'count'        => (int) $this->count(),
                'per_page'     => (int) $this->perPage(),
                'current_page' => (int) $this->currentPage(),
                'total_pages'  => (int) $this->lastPage(),
                'last_page'    => (int) $this->lastPage(),
                'from'         => (int) $this->firstItem(),
                'to'           => (int) $this->lastItem(),
            ],

            // 4. Navigasi Links
            'links' => [
                'self'  => route('guru.index'),
                'first' => $this->url(1),
                'last'  => $this->url($this->lastPage()),
                'prev'  => $this->previousPageUrl(),
                'next'  => $this->nextPageUrl(),
            ],

            // 5. Queries (Dokumentasi Pencarian)
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

            // 6. Template (Blueprint untuk POST data baru)
            'template' => [
                'data' => [
                    ['name' => 'nip', 'prompt' => 'NIP (Nomor Induk Pegawai)'],
                    ['name' => 'nama', 'prompt' => 'Nama Lengkap (Wajib)'],
                    ['name' => 'gender', 'prompt' => 'laki-laki / perempuan (Wajib)'],
                    ['name' => 'email', 'prompt' => 'Alamat Email aktif (Wajib)'],
                    ['name' => 'phone_number', 'prompt' => 'Nomor WhatsApp'],
                    ['name' => 'pendidikan', 'prompt' => 'Pendidikan Terakhir']
                ]
            ]
        ];
    }
}