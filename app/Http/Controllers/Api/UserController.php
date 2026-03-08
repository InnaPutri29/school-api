<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    private function success($data, $statusCode, $message = 'success')
    {
        return response()->json([
            'status' => true,
            'message' => $message,
            'data' => $data,
            'status_code' => $statusCode
        ], $statusCode);
    }

    private function failedResponse($message, $statusCode)
    {
        return response()->json([
            'status' => false,
            'message' => $message,
            'data' => null,
            'status_code' => $statusCode
        ], $statusCode);
    }

    public function index()
    {
        $users = User::all();

        return $this->success($users, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi data yang masuk
        $validator = Validator::make($request->all(), [
            'type' => 'required|in:admin,guru',
            'username' => 'required|string|unique:users,username',
            'password' => 'required|min:6'
        ]);

        // Jika validasi gagal
        if ($validator->fails()) {
            $msg = $validator->errors();
            return $this->failedResponse($msg, 422);
        }

        // Proses simpan data ke database 
        $user = new User();
        $user->type = $request->type;
        $user->username = $request->username;
        $user->password = Hash::make($request->password);

        $saveUser = $user->save();

        if ($saveUser) {
            return $this->success($user, 201);
        } else {
            return $this->failedResponse('User gagal ditambahkan!', 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return $this->success($user, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        // Validasi data yang akan diupdate
        $validator = Validator::make($request->all(), [
            'type' => 'required|in:admin,guru',
            'username' => 'required|string|unique:users,username,' . $user->id,
            'password' => 'nullable|min:6' // Password boleh kosong jika tidak ingin diubah
        ]);

        if ($validator->fails()) {
            return $this->failedResponse($validator->errors(), 422);
        }

        $user->type = $request->type;
        $user->username = $request->username;

        // Hanya update password jika diisi
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        if ($user->save()) {
            return $this->success($user, 200, 'User berhasil diperbarui');
        }

        return $this->failedResponse('User gagal diperbarui!', 500);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $deleteData = $user->delete();

        if ($deleteData) {
            return $this->success(null, 200, 'User berhasil dihapus');
        } else {
            return $this->failedResponse('User gagal dihapus!', 500);
        }
    }
}
