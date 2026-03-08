<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Model\Jadwal;
use Illuminate\Http\Request;

class JadwalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jadwal = Jadwal::all();

        return response()->json([
            'status' => true,
            'message' => 'success',
            'data' => $jadwal,
            'status_code' => 200
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $jadwal = Jadwal::create($request->all());

        return response()->json([
            'status' => true,
            'message' => 'success',
            'data' => $jadwal,
            'status_code' => 201
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Jadwal $jadwal)
    {
        return response()->json([
            'status' => true,
            'message' => 'success',
            'data' => $jadwal,
            'status_code' => 200
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Jadwal $jadwal)
    {
        $jadwal->update($request->all());

        return response()->json([
            'status' => true,
            'message' => 'success',
            'data' => $jadwal,
            'status_code' => 200
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Jadwal $jadwal)
    {
        $jadwal->delete();

        return response()->json([
            'status' => true,
            'message' => 'success',
            'data' => null,
            'status_code' => 200
        ], 200);
    }
}
