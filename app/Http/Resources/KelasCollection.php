<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class KelasCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'href' => route('kelas.index'),

            'items' => $this->collection,

            'links' => [
                [
                    'rel'  => 'self',
                    'href' => route('kelas.index')
                ]
            ],

            'queries' => [
                [
                    'rel'    => 'search',
                    'href'   => route('kelas.index'),
                    'prompt' => 'Cari Kelas berdasarkan Kode atau Nama',
                    'data'   => [
                        ['name' => 'kode_kelas', 'value' => ''],
                        ['name' => 'nama_kelas', 'value' => '']
                    ]
                ]
            ],

            'template' => [
                'data' => [
                    ['name' => 'kode_kelas', 'value' => '', 'prompt' => 'Kode Kelas (Unik, misal: X-IPA-1)'],
                    ['name' => 'nama_kelas', 'value' => '', 'prompt' => 'Nama Kelas (misal: Kelas X IPA 1)']
                ]
            ]
        ];
    }
}
