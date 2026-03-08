<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Model\Mapel;
use Illuminate\Http\Request;

class MapelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mapel = Mapel::all();

        return response()->json([
            'status' => true,
            'message' => 'success',
            'data' => $mapel,
            'status_code' => 200
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $mapel = Mapel::create($request->all());

        return response()->json([
            'status' => true,
            'message' => 'success',
            'data' => $mapel,
            'status_code' => 201
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Mapel $mapel)
    {
        return response()->json([
            'status' => true,
            'message' => 'success',
            'data' => $mapel,
            'status_code' => 200
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Mapel $mapel)
    {
        $mapel->update($request->all());

        return response()->json([
            'status' => true,
            'message' => 'success',
            'data' => $mapel,
            'status_code' => 200
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Mapel $mapel)
    {
        $mapel->delete();

        return response()->json([
            'status' => true,
            'message' => 'success',
            'data' => null,
            'status_code' => 200
        ], 200);
    }
}
