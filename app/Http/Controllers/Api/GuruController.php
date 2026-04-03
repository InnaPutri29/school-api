<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Guru;
use App\Http\Requests\Guru\GuruStoreRequest;
use App\Http\Requests\Guru\GuruUpdateRequest;
use App\Http\Resources\GuruCollection;
use App\Http\Resources\GuruResource;
use Illuminate\Http\JsonResponse;
use Exception;
use Illuminate\Support\Facades\Auth;

class GuruController extends Controller
{
    /**
     * Menampilkan daftar semua guru dengan pagination.
     */
    public function index(): GuruCollection
    {
        // Menggunakan latest() agar data terbaru muncul paling atas
        $guru = Guru::with('user')->latest()->paginate(10);
        return new GuruCollection($guru);
    }

    /**
     * Menyimpan data guru baru ke database.
     */
public function store(GuruStoreRequest $request): JsonResponse
{
    try {
        $data = $request->validated();
        // Pakai auth('api') agar lebih pasti terbaca oleh JWT
        $data['user_id'] = auth('api')->id() ?? auth()->id(); 

        $guru = Guru::create($data);

        return (new GuruResource($guru->load('user')))
            ->additional(['meta' => ['message' => 'Sukses!', 'status' => 'success']])
            ->response()->setStatusCode(201);
    } catch (Exception $e) {
        return response()->json(['error' => $e->getMessage()], 500);
    }
}

    /**
     * Menampilkan detail satu guru berdasarkan ID.
     */
    public function show(Guru $guru): GuruResource
    {
        return new GuruResource($guru->load('user'));
    }

    /**
     * Memperbarui data guru yang sudah ada.
     */
    public function update(GuruUpdateRequest $request, Guru $guru): JsonResponse
    {
        try {
            $guru->update($request->validated());

            return (new GuruResource($guru->load('user')))
                ->additional([
                    'meta' => [
                        'message' => 'Data guru berhasil diperbarui!',
                        'status' => 'success'
                    ]
                ])
                ->response()
                ->setStatusCode(200);

        } catch (Exception $e) {
            return response()->json([
                'meta' => [
                    'message' => 'Gagal memperbarui data guru',
                    'status' => 'error'
                ],
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Menghapus data guru dari database.
     */
    public function destroy(Guru $guru): JsonResponse
    {
        try {
            $guru->delete();
            return response()->json([
                'meta' => [
                    'message' => 'Data guru berhasil dihapus',
                    'status' => 'success'
                ]
            ], 200);
            
        } catch (Exception $e) {
            return response()->json([
                'meta' => [
                    'message' => 'Gagal menghapus data guru',
                    'status' => 'error'
                ],
                'error' => $e->getMessage()
            ], 500);
        }
    }
}