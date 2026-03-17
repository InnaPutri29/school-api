<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    protected $table = 'kelas';
    protected $fillable = ['kode_kelas', 'nama_kelas'];

    public function siswas()
    {
        return $this->hasMany('App\Models\Siswa', 'kelas_id');
    }

    public function jadwals()
    {
        return $this->hasMany('App\Models\Jadwal', 'kelas_id');
    }
}
