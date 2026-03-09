<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class GuruResource extends JsonResource
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
            'nip'          => $this->nip,
            'nama'         => $this->nama,
            'email'        => $this->email,
            'gender'       => $this->gender,
            'info_akun'    => [
                'user_id'  => $this->user_id,
                'username' => $this->user->username,
            ],
            '_links'       => [
                [
                    'rel'    => 'self',
                    'method' => 'GET',
                    'href'   => route('guru.show', ['guru' => $this->id])
                ],
                [
                    'rel'    => 'update',
                    'method' => 'PUT',
                    'href'   => route('guru.update', ['guru' => $this->id])
                ],
                [
                    'rel'    => 'delete',
                    'method' => 'DELETE',
                    'href'   => route('guru.destroy', ['guru' => $this->id])
                ],
            ]
        ];
    }
}
