<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\GuruController;
use App\Http\Controllers\Api\MapelController;
use App\Http\Controllers\Api\KelasController;
use App\Http\Controllers\Api\SiswaController;
use App\Http\Controllers\Api\JadwalController;
use App\Http\Controllers\Api\AuthController;

// --- RUTE PUBLIK (SAFE METHODS) ---
// Method index dan show bisa diakses siapa saja tanpa token
Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::apiResource('users', UserController::class)->only(['index', 'show']);
Route::apiResource('kelas', KelasController::class)->only(['index', 'show']);
Route::apiResource('mapel', MapelController::class)->only(['index', 'show']);
Route::apiResource('guru', GuruController::class)->only(['index', 'show']);
Route::apiResource('jadwal', JadwalController::class)->only(['index', 'show']);
Route::apiResource('siswa', SiswaController::class)->only(['index', 'show']);

// --- RUTE TERPROTEKSI (UNSAFE METHODS) ---
// Method store, update, dan destroy wajib menggunakan Token JWT
Route::group(['middleware' => ['jwt.verify']], function() {
    
    Route::get('cek-token', [UserController::class, 'cek_token']);
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/profile', [AuthController::class, 'profile'])->name('profile.show');
    Route::put('/profile', [AuthController::class, 'updateProfile'])->name('profile.update');

    Route::apiResource('users', UserController::class)->except(['index', 'show']);
    Route::apiResource('kelas', KelasController::class)->except(['index', 'show']);
    Route::apiResource('mapel', MapelController::class)->except(['index', 'show']);
    Route::apiResource('guru', GuruController::class)->except(['index', 'show']);
    Route::apiResource('jadwal', JadwalController::class)->except(['index', 'show']);
    Route::apiResource('siswa', SiswaController::class)->except(['index', 'show']);
});