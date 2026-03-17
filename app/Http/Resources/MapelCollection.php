<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class MapelCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'href' => route('mapel.index'),

            'items' => $this->collection,

            'links' => [
                [
                    'rel'  => 'self',
                    'href' => route('mapel.index')
                ]
            ],

            'queries' => [
                [
                    'rel'    => 'search',
                    'href'   => route('mapel.index'),
                    'prompt' => 'Cari Mata Pelajaran berdasarkan Kode atau Nama',
                    'data'   => [
                        ['name' => 'kode_mapel', 'value' => ''],
                        ['name' => 'nama_mapel', 'value' => '']
                    ]
                ]
            ],

            'template' => [
                'data' => [
                    ['name' => 'kode_mapel', 'value' => '', 'prompt' => 'Kode Mapel (Unik, misal: MTK01)'],
                    ['name' => 'nama_mapel', 'value' => '', 'prompt' => 'Nama Mata Pelajaran (misal: Matematika Lanjut)']
                ]
            ]
        ];
    }
}