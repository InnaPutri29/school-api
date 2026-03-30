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
     */
    public function profile()
    {
        $user = Auth::guard('api')->user();
        return new UserResource($user);
    }

    /**
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
