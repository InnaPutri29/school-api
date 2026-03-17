<?php

namespace App\Http\Requests\Siswa;

use Illuminate\Foundation\Http\FormRequest;

class SiswaStoreRequest extends FormRequest
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
            'nis'          => 'required|string|unique:siswa,nis',
            'nama'         => 'required|string|max:255',
            'email'        => 'required|string|email|unique:siswa,email',
            'nama_ortu'    => 'nullable|string|max:255',
            'phone_number' => 'nullable|string|max:20',
            'gender'       => 'required|in:laki-laki,perempuan',
            'kelas_id'     => 'required|exists:kelas,id',
            'tempat_lahir' => 'nullable|string',
            'tgl_lahir'    => 'nullable|date',
            'alamat'       => 'nullable|string',
        ];
    }
}
