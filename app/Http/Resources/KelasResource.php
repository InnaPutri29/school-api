<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class KelasResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'kode_kelas' => $this->kode_kelas,
            'nama_kelas' => $this->nama_kelas,
            '_links' => [
                [
                    'rel' => 'self',
                    'method' => 'GET',
                    'href' => route('kelas.show', ['kela' => $this->id])
                ],
                [
                    'rel' => 'update',
                    'method' => 'PUT',
                    'href' => route('kelas.update', ['kela' => $this->id])
                ],
                [
                    'rel' => 'delete',
                    'method' => 'DELETE',
                    'href' => route('kelas.destroy', ['kela' => $this->id])
                ],
            ]
        ];
    }
}
