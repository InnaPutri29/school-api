<?php

namespace App\Http\Requests\Guru;

use Illuminate\Foundation\Http\FormRequest;

class GuruUpdateRequest extends FormRequest
{
    /**
     * Tentukan apakah pengguna diizinkan untuk melakukan permintaan ini.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Dapatkan aturan validasi yang berlaku untuk permintaan tersebut.
     */
    public function rules(): array
    {
        // Mengambil ID guru dari route agar pengecekan 'unique' mengabaikan data diri sendiri
        $guru = $this->route('guru');
        $guruId = is_object($guru) ? $guru->id : $guru;

        return [
            'nama'         => 'required|string|max:255',
            'gender'       => 'required|in:laki-laki,perempuan',
            
            // PERBAIKAN: Menggunakan tabel 'guru' (tanpa S) sesuai database kamu
            'nip'          => 'required|string|unique:guru,nip,' . $guruId,
            'email'        => 'required|email|unique:guru,email,' . $guruId,
            
            'phone_number' => 'nullable|string',
            'pendidikan'   => 'nullable|string',
            'tempat_lahir' => 'nullable|string',
            'tgl_lahir'    => 'nullable|date',
            'alamat'       => 'nullable|string',
        ];
    }

    /**
     * Custom message jika validasi gagal (Opsional)
     */
    public function messages(): array
    {
        return [
            'nip.unique'   => 'NIP ini sudah digunakan oleh guru lain.',
            'email.unique' => 'Email ini sudah terdaftar di sistem.',
            'gender.in'    => 'Jenis kelamin harus laki-laki atau perempuan.',
        ];
    }
}