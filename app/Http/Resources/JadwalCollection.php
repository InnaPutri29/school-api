<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class JadwalCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'href' => route('jadwal.index'),

            'items' => $this->collection,

            'links' => [
                [
                    'rel'  => 'self',
                    'href' => route('jadwal.index')
                ]
            ],

            'queries' => [
                [
                    'rel'    => 'search',
                    'href'   => route('jadwal.index'),
                    'prompt' => 'Cari Jadwal berdasarkan Hari atau ID Kelas',
                    'data'   => [
                        ['name' => 'hari', 'value' => ''],
                        ['name' => 'kelas_id', 'value' => '']
                    ]
                ]
            ],

            'template' => [
                'data' => [
                    ['name' => 'guru_id', 'value' => '', 'prompt' => 'ID Guru Pengampu (Wajib)'],
                    ['name' => 'mapel_id', 'value' => '', 'prompt' => 'ID Mata Pelajaran (Wajib)'],
                    ['name' => 'kelas_id', 'value' => '', 'prompt' => 'ID Kelas (Wajib)'],
                    ['name' => 'hari', 'value' => '', 'prompt' => 'Hari (senin, selasa, rabu, kamis, jumat, sabtu)'],
                    ['name' => 'jam_pelajaran', 'value' => '', 'prompt' => 'Jam Pelajaran (07:00 - 08:00)'],
                ]
            ]
        ];
    }
}