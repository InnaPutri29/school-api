<?php

namespace App\Http\Requests\Guru;

use Illuminate\Foundation\Http\FormRequest;

class GuruStoreRequest extends FormRequest
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
        return [
            'user_id'      => 'required|exists:users,id|unique:guru,user_id',
            'nip'          => 'nullable|string|unique:guru,nip',
            'nama'         => 'required|string|max:255',
            'gender'       => 'required|in:laki-laki,perempuan',
            'email'        => 'required|email|unique:guru,email',
            'tempat_lahir' => 'nullable|string',
            'tgl_lahir'    => 'nullable|date',
            'phone_number' => 'nullable|string|max:15',
            'alamat'       => 'nullable|string',
            'pendidikan'   => 'nullable|string',
        ];
    }
}
