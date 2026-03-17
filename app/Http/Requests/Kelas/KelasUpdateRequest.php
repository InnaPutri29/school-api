<?php

namespace App\Http\Requests\Kelas;

use Illuminate\Foundation\Http\FormRequest;

class KelasUpdateRequest extends FormRequest
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
        $kelasId = $this->route('kela'); // Laravel default plural-to-singular untuk 'kelas' adalah 'kela'

        $id = is_object($kelasId) ? $kelasId->id : $kelasId;

        return [
            'kode_kelas' => 'sometimes|required|string|unique:kelas,kode_kelas,' . $id,
            'nama_kelas' => 'sometimes|required|string|max:255',
        ];
    }
}
