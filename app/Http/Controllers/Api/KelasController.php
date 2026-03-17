<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Kelas\KelasStoreRequest;
use App\Http\Requests\Kelas\KelasUpdateRequest;
use App\Http\Resources\KelasCollection;
use App\Http\Resources\KelasResource;
use App\Models\Kelas;

class KelasController extends Controller
{
    public function index()
    {
        $kelas = Kelas::paginate(10);
        return new KelasCollection($kelas);
    }

    public function store(KelasStoreRequest $request)
    {
        $kelas = Kelas::create($request->validated());
        return (new KelasResource($kelas))->response()->setStatusCode(201);
    }

    public function show(Kelas $kela)
    {
        return new KelasResource($kela);
    }

    public function update(KelasUpdateRequest $request, Kelas $kela)
    {
        $kela->update($request->validated());
        return (new KelasResource($kela))->additional([
            'meta' => [
                'message' => 'Kelas berhasil diperbarui!',
                'status' => 'success'
            ]
        ])->response()->setStatusCode(200);
    }

    public function destroy(Kelas $kela)
    {
        $kela->delete();
        return response()->json(['message' => 'Kelas berhasil dihapus'], 200);
    }
}
