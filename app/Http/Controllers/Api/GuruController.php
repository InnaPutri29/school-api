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

class GuruController extends Controller
{
    /**
     * Menampilkan daftar semua guru dengan pagination.
     */
    public function index(): GuruCollection
    {
        // Tetap gunakan paginate(10) agar link navigasi 
        // di GuruCollection (next, prev, dll) bisa digenerate otomatis oleh Laravel
        $guru = Guru::latest()->paginate(10);
        
        return new GuruCollection($guru);
    }

    /**
     * Menyimpan data guru baru ke database.
     */
    public function store(GuruStoreRequest $request): JsonResponse
    {
        try {
            $data = $request->validated();
            
            // user_id diambil otomatis dari yang sedang login
            $data['user_id'] = auth('api')->id(); 

            $guru = Guru::create($data);

            return (new GuruResource($guru))
                ->additional([
                    'meta' => [
                        'message' => 'Data guru berhasil ditambahkan!', 
                        'status' => 'success'
                    ]
                ])
                ->response()->setStatusCode(201);
        } catch (Exception $e) {
            return response()->json([
                'meta' => ['message' => 'Gagal menambah data', 'status' => 'error'],
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Menampilkan detail satu guru berdasarkan ID.
     */
    public function show(Guru $guru): GuruResource
    {
        // Load relation 'user' agar informasi akun muncul di Detail View
        return new GuruResource($guru->load('user'));
    }

    /**
     * Memperbarui data guru yang sudah ada.
     */
    public function update(GuruUpdateRequest $request, Guru $guru): JsonResponse
    {
        try {
            $guru->update($request->validated());

            return (new GuruResource($guru))
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
                'meta' => ['message' => 'Gagal memperbarui data', 'status' => 'error'],
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
                'meta' => ['message' => 'Gagal menghapus data', 'status' => 'error'],
                'error' => $e->getMessage()
            ], 500);
        }
    }
}