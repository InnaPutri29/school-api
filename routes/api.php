<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\GuruController;
use App\Http\Controllers\Api\MapelController;
use App\Http\Controllers\Api\KelasController;
use App\Http\Controllers\Api\SiswaController;
use App\Http\Controllers\Api\JadwalController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Resources\UserResource;

Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/me', function () {
        return new UserResource(auth()->user());
    })->name('profile.show');
});

Route::apiResource('/users', UserController::class);
Route::apiResource('/guru', GuruController::class);
Route::apiResource('/mapel', MapelController::class);
Route::apiResource('/kelas', KelasController::class);
Route::apiResource('/siswa', SiswaController::class);
Route::apiResource('/jadwal', JadwalController::class);
