<?php

namespace App\Http\Requests\Siswa;

use Illuminate\Foundation\Http\FormRequest;

class SiswaUpdateRequest extends FormRequest
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
        $siswa = $this->route('siswa');
        $id = is_object($siswa) ? $siswa->id : $siswa;

        return [
            'nis'          => 'sometimes|required|string|unique:siswa,nis,' . $id,
            'email'        => 'sometimes|required|string|email|unique:siswa,email,' . $id,
            'nama_ortu'    => 'nullable|string|max:255',
            'phone_number' => 'nullable|string|max:20',
            'nama'         => 'sometimes|required|string|max:255',
            'gender'       => 'sometimes|required|in:laki-laki,perempuan',
            'kelas_id'     => 'sometimes|required|exists:kelas,id',
            'tempat_lahir' => 'nullable|string',
            'tgl_lahir'    => 'nullable|date',
            'alamat'       => 'nullable|string',
        ];
    }
}
