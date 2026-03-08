<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Model\Kelas;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kelas = Kelas::all();

        return response()->json([
            'status' => true,
            'message' => 'success',
            'data' => $kelas,
            'status_code' => 200
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $kelas = Kelas::create($request->all());

        return response()->json([
            'status' => true,
            'message' => 'success',
            'data' => $kelas,
            'status_code' => 201
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Kelas $kelas)
    {
        return response()->json([
            'status' => true,
            'message' => 'success',
            'data' => $kelas,
            'status_code' => 200
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kelas $kelas)
    {
        $kelas->update($request->all());

        return response()->json([
            'status' => true,
            'message' => 'success',
            'data' => $kelas,
            'status_code' => 200
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kelas $kelas)
    {
        $kelas->delete();

        return response()->json([
            'status' => true,
            'message' => 'success',
            'data' => null,
            'status_code' => 200
        ], 200);
    }
}
