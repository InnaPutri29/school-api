<?php

namespace App\Http\Requests\Mapel;

use Illuminate\Foundation\Http\FormRequest;

class MapelUpdateRequest extends FormRequest
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
        $mapelId = $this->route('mapel');
        $id = is_object($mapelId) ? $mapelId->id : $mapelId;

        return [
            'kode_mapel' => 'sometimes|required|string|unique:mapel,kode_mapel,' . $id,
            'nama_mapel' => 'sometimes|required|string|max:255',
        ];
    }
}
