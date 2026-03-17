<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $userId = $this->route('user');

        $id = is_object($userId) ? $userId->id : $userId;

        return [
            'username' => 'sometimes|required|string|unique:users,username,' . $id,
            'password' => 'sometimes|nullable|string|min:8',
            'type'     => 'sometimes|required|in:admin,guru',
        ];
    }
}
