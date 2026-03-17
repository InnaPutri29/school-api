<?php

namespace App\Http\Requests\Mapel;

use Illuminate\Foundation\Http\FormRequest;

class MapelStoreRequest extends FormRequest
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
            'kode_mapel' => 'required|string|unique:mapel,kode_mapel',
            'nama_mapel' => 'required|string|max:255',
        ];
    }
}
