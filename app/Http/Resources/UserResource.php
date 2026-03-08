<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $currentUser = $request->user();
        $isMe = $currentUser && $currentUser->id === $this->id;

        $links = [];

        if ($isMe) {
            $links[] = [
                'rel'    => 'profile',
                'method' => 'GET',
                'href'   => route('profile.show')
            ];
            $links[] = [
                'rel'    => 'update-profile',
                'method' => 'PUT',
                'href'   => route('profile.update')
            ];
            $links[] = [
                'rel'    => 'logout',
                'method' => 'POST',
                'href'   => route('logout')
            ];
        }

        if ($currentUser && $currentUser->type === 'admin') {
            $links[] = [
                'rel'    => 'self',
                'method' => 'GET',
                'href'   => route('users.show', ['user' => $this->id])
            ];
            $links[] = [
                'rel'    => 'update',
                'method' => 'PUT',
                'href'   => route('users.update', ['user' => $this->id])
            ];
            $links[] = [
                'rel'    => 'delete',
                'method' => 'DELETE',
                'href'   => route('users.destroy', ['user' => $this->id])
            ];
        }

        return [
            'id'       => $this->id,
            'username' => $this->username,
            'role'     => $this->type,
            '_links'   => $links
        ];
    }
}
