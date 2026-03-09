<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SiswaResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'           => $this->id,
            'nis'          => $this->nis,
            'nama'         => $this->nama,
            'email'        => $this->email,
            'nama_ortu'    => $this->nama_ortu, 
            'phone_number' => $this->phone_number,
            'gender'       => $this->gender,
            'tempat_lahir' => $this->tempat_lahir,
            'tgl_lahir'    => $this->tgl_lahir,
            'alamat'       => $this->alamat,
            'kelas'        => $this->whenLoaded('kelas', function () {
                return [
                    'id'         => $this->kelas->id,
                    'nama_kelas' => $this->kelas->nama_kelas
                ];
            }),
            '_links'       => [
                [
                    'rel'    => 'self',
                    'method' => 'GET',
                    'href'   => route('siswa.show', ['siswa' => $this->id])
                ],
                [
                    'rel'    => 'update',
                    'method' => 'PUT',
                    'href'   => route('siswa.update', ['siswa' => $this->id])
                ],
                [
                    'rel'    => 'delete',
                    'method' => 'DELETE',
                    'href'   => route('siswa.destroy', ['siswa' => $this->id])
                ],
            ]
        ];
    }
}
