<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Model\Guru;
use Illuminate\Http\Request;

class GuruController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $guru = Guru::all();

        return response()->json([
            'status' => true,
            'message' => 'success',
            'data' => $guru,
            'status_code' => 200
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $guru = Guru::create($request->all());

        return response()->json([
            'status' => true,
            'message' => 'success',
            'data' => $guru,
            'status_code' => 201
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Guru $guru)
    {
        return response()->json([
            'status' => true,
            'message' => 'success',
            'data' => $guru,
            'status_code' => 200
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Guru $guru)
    {
        $guru->update($request->all());

        return response()->json([
            'status' => true,
            'message' => 'success',
            'data' => $guru,
            'status_code' => 200
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Guru $guru)
    {
        $guru->delete();

        return response()->json([
            'status' => true,
            'message' => 'success',
            'data' => null,
            'status_code' => 200
        ], 200);
    }
}
