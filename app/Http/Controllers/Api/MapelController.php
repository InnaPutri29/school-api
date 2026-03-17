<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Mapel;
use App\Http\Requests\Mapel\MapelStoreRequest;
use App\Http\Requests\Mapel\MapelUpdateRequest;
use App\Http\Resources\MapelCollection;
use App\Http\Resources\MapelResource;

class MapelController extends Controller
{
    public function index()
    {
        $mapel = Mapel::paginate(10);
        return new MapelCollection($mapel);
    }

    public function store(MapelStoreRequest $request)
    {
        $mapel = Mapel::create($request->validated());
        return (new MapelResource($mapel))->response()->setStatusCode(201);
    }

    public function show(Mapel $mapel)
    {
        return new MapelResource($mapel);
    }

    public function update(MapelUpdateRequest $request, Mapel $mapel)
    {
        $mapel->update($request->validated());
        return (new MapelResource($mapel))->additional([
            'meta' => [
                'message' => 'Mata pelajaran berhasil diperbarui!',
                'status' => 'success'
            ]
        ])->response()->setStatusCode(200);
    }

    public function destroy(Mapel $mapel)
    {
        $mapel->delete();
        return response()->json(['message' => 'Mata pelajaran berhasil dihapus'], 200);
    }
}
