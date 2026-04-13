<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\GuruController;
use App\Http\Controllers\Api\MapelController;
use App\Http\Controllers\Api\KelasController;
use App\Http\Controllers\Api\SiswaController;
use App\Http\Controllers\Api\JadwalController;
use App\Http\Controllers\Api\AuthController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/

// --- RUTE PUBLIK (Bisa diakses tanpa login) ---
Route::post('/login', [AuthController::class, 'login'])->name('login');

// --- RUTE TERPROTEKSI (Wajib Login / JWT Token) ---
Route::group(['middleware' => ['jwt.verify']], function() {
    
    // Auth & Profile
    Route::get('cek-token', [UserController::class, 'cek_token']);
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/profile', [AuthController::class, 'profile'])->name('profile.show');
    Route::put('/profile', [AuthController::class, 'updateProfile'])->name('profile.update');
    Route::post('/register', [AuthController::class, 'register']);

    // Resource Management
    // Ini otomatis mencakup index, store, show, update, dan destroy
    Route::apiResource('users', UserController::class);
    Route::apiResource('kelas', KelasController::class);
    Route::apiResource('mapel', MapelController::class);
    Route::apiResource('guru', GuruController::class);
    Route::apiResource('jadwal', JadwalController::class);
    Route::apiResource('siswa', SiswaController::class);

});