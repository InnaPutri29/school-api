<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Model\Siswa;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $siswa = Siswa::all();

        return response()->json([
            'status' => true,
            'message' => 'success',
            'data' => $siswa,
            'status_code' => 200
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $siswa = Siswa::create($request->all());

        return response()->json([
            'status' => true,
            'message' => 'success',
            'data' => $siswa,
            'status_code' => 201
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Siswa $siswa)
    {
        return response()->json([
            'status' => true,
            'message' => 'success',
            'data' => $siswa,
            'status_code' => 200
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Siswa $siswa)
    {
        $siswa->update($request->all());

        return response()->json([
            'status' => true,
            'message' => 'success',
            'data' => $siswa,
            'status_code' => 200
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Siswa $siswa)
    {
        $siswa->delete();

        return response()->json([
            'status' => true,
            'message' => 'success',
            'data' => null,
            'status_code' => 200
        ], 200);
    }
}
