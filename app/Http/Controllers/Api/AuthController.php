<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\User\UserUpdateRequest;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
    /**
     * Berfungsi untuk mengembalikan response sukses
     */
    private function success($data, $statusCode, $message = 'success')
    {
        return response()->json([
            'status' => true,
            'message' => $message,
            'data' => $data,
            'status_code' => $statusCode
        ], $statusCode);
    }

    /**
     * Berfungsi untuk mengembalikan response gagal
     */
    private function failedResponse($message, $statusCode)
    {
        return response()->json([
            'status' => false,
            'message' => $message,
            'data' => null,
            'status_code' => $statusCode
        ], $statusCode);
    }

    /**
     * Fungsi Login JWT
     */
    public function login(LoginRequest $request)
    {
        $credentials = $request->only('username', 'password');

        if (!$token = Auth::guard('api')->attempt($credentials)) {
            return $this->failedResponse('Username atau password salah!', 401);
        }

        $user = Auth::guard('api')->user();

        return (new UserResource($user))->additional([
            'meta' => [
                'token' => $token,
                'token_type' => 'Bearer',
            ],
            'status' => true,
            'message' => 'Logged in.'
        ]);
    }

    /**
     * Fungsi Register JWT
     */
    public function register(Request $request)
    {
        // 1. Validasi Input
        $validator = Validator::make($request->all(), [
            'username' => 'required|string|max:255|unique:users',
            'email'    => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validasi gagal!',
                'errors' => $validator->errors()
            ], 422);
        }

        // 2. Buat User Baru
        $user = User::create([
            'username' => $request->username,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
            'role'     => 'siswa' // Default role (Hapus/sesuaikan jika database kamu tidak butuh 'role')
        ]);

        // 3. Generate Token JWT secara otomatis setelah mendaftar
        $token = Auth::guard('api')->login($user);

        // 4. Kembalikan Response
        return (new UserResource($user))->additional([
            'meta' => [
                'token' => $token,
                'token_type' => 'Bearer',
            ],
            'status' => true,
            'message' => 'Registrasi berhasil.'
        ]);
    }

    /**
     * Ambil Data Profil
     */
    public function profile()
    {
        $user = Auth::guard('api')->user();
        return new UserResource($user);
    }

    /**
     * Update Profil User
     */
    public function updateProfile(UserUpdateRequest $request)
    {
        /** @var User $user */ 
        $user = Auth::guard('api')->user();

        $data = $request->only(['username']);

        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        $user->update($data);

        return (new UserResource($user))->additional([
            'meta' => [
                'message' => 'Profil berhasil diperbarui'
            ]
        ]);
    }

    /**
     * Fungsi Logout
     */
    public function logout()
    {
        Auth::guard('api')->logout();

        return response()->json([
            'success' => true,
            'message' => 'Berhasil logout'
        ]);
    }
}