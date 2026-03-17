<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\GuruController;
use App\Http\Controllers\Api\MapelController;
use App\Http\Controllers\Api\KelasController;
use App\Http\Controllers\Api\SiswaController;
use App\Http\Controllers\Api\JadwalController;
use App\Http\Controllers\Api\AuthController;

Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/profile', [AuthController::class, 'profile'])->name('profile.show');
    Route::put('/profile', [AuthController::class, 'updateProfile'])->name('profile.update');

    Route::middleware('admin')->group(function () {
        Route::apiResource('users', UserController::class);
        Route::apiResource('/kelas', KelasController::class);
        Route::apiResource('/mapel', MapelController::class);
        Route::apiResource('/guru', GuruController::class);
        Route::apiResource('/jadwal', JadwalController::class);
        Route::apiResource('/siswa', SiswaController::class);
    });
});

