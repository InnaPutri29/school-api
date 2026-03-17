<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Siswa;
use App\Http\Requests\Siswa\SiswaStoreRequest;
use App\Http\Requests\Siswa\SiswaUpdateRequest;
use App\Http\Resources\SiswaCollection;
use App\Http\Resources\SiswaResource;

class SiswaController extends Controller
{
    public function index()
    {
        // Eager load tabel kelas agar performa kencang
        $siswa = Siswa::with('kelas')->paginate(10);
        return new SiswaCollection($siswa);
    }

    public function store(SiswaStoreRequest $request)
    {
        $siswa = Siswa::create($request->validated());

        return (new SiswaResource($siswa->load('kelas')))
            ->response()
            ->setStatusCode(201);
    }

    public function show(Siswa $siswa)
    {
        return new SiswaResource($siswa->load('kelas'));
    }

    public function update(SiswaUpdateRequest $request, Siswa $siswa)
    {
        $siswa->update($request->validated());

        return (new SiswaResource($siswa->load('kelas')))->additional([
            'meta' => [
                'message' => 'Data siswa berhasil diperbarui!',
                'status'  => 'success'
            ]
        ])->response()->setStatusCode(200);
    }

    public function destroy(Siswa $siswa)
    {
        $siswa->delete();
        return response()->json(['message' => 'Data siswa berhasil dihapus'], 200);
    }
}
