<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class JadwalResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id'          => $this->id,
            'hari'        => $this->hari,
            'jam_pelajaran'   => $this->jam_pelajaran,
            'guru'        => $this->whenLoaded('guru', function () {
                return $this->guru->nama;
            }),
            'mapel'       => $this->whenLoaded('mapel', function () {
                return $this->mapel->nama_mapel;
            }),
            'kelas'       => $this->whenLoaded('kelas', function () {
                return $this->kelas->nama_kelas;
            }),
            '_links'      => [
                [
                    'rel'    => 'self',
                    'method' => 'GET',
                    'href'   => route('jadwal.show', ['jadwal' => $this->id])
                ],
                [
                    'rel'    => 'update',
                    'method' => 'PUT',
                    'href'   => route('jadwal.update', ['jadwal' => $this->id])
                ],
                [
                    'rel'    => 'delete',
                    'method' => 'DELETE',
                    'href'   => route('jadwal.destroy', ['jadwal' => $this->id])
                ],
            ]
        ];
    }
}
