<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Guru;
use App\Http\Requests\Guru\GuruStoreRequest;
use App\Http\Requests\Guru\GuruUpdateRequest;
use App\Http\Resources\GuruCollection;
use App\Http\Resources\GuruResource;

class GuruController extends Controller
{
    public function index()
    {
        $guru = Guru::with('user')->paginate(10);
        return new GuruCollection($guru);
    }

    public function store(GuruStoreRequest $request)
    {
        $guru = Guru::create($request->validated());
        return (new GuruResource($guru->load('user')))->response()->setStatusCode(201);
    }

    public function show(Guru $guru)
    {
        return new GuruResource($guru->load('user'));
    }

    public function update(GuruUpdateRequest $request, Guru $guru) 
    {
        $guru->update($request->validated());
        return (new GuruResource($guru->load('user')))->additional([
            'meta' => [
                'message' => 'Data guru berhasil diperbarui!',
                'status' => 'success'
            ]
        ])->response()->setStatusCode(200);
    }

    public function destroy(Guru $guru)
    {
        $guru->delete();
        return response()->json(['message' => 'Data guru berhasil dihapus'], 200);
    }
}