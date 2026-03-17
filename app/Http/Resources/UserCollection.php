<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class UserCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'href' => route('users.index'),

            'items' => $this->collection,

            'links' => [
                [
                    'rel' => 'self',
                    'href' => route('users.index')
                ],
                
            ],

            'queries' => [
                [
                    'rel'    => 'search',
                    'href'   => route('users.index'),
                    'prompt' => 'Cari User berdasarkan Username atau Role',
                    'data'   => [
                        ['name' => 'username', 'value' => ''],
                        ['name' => 'type', 'value' => '']
                    ]
                ]
            ],

            'template' => [
                'data' => [
                    ['name' => 'username', 'value' => '', 'prompt' => 'Username (Wajib unik)'],
                    ['name' => 'password', 'value' => '', 'prompt' => 'Password (Minimal 8 karakter)'],
                    ['name' => 'type', 'value' => '', 'prompt' => 'Role (admin atau guru)']
                ]
            ]
        ];
    }
}
