<?php

namespace App\Http\Requests\Jadwal;

use Illuminate\Foundation\Http\FormRequest;

class JadwalUpdateRequest extends FormRequest
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
    { {
            return [
                'guru_id'       => 'sometimes|required|exists:guru,id',
                'mapel_id'      => 'sometimes|required|exists:mapel,id',
                'kelas_id'      => 'sometimes|required|exists:kelas,id',
                'hari'          => 'sometimes|required|string|in:senin,selasa,rabu,kamis,jumat,sabtu',
                'jam_pelajaran' => 'sometimes|required|string',
            ];
        }
    }
}
