<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Http\Requests\User\UserStoreRequest;
use App\Http\Requests\User\UserUpdateRequest;
use App\Http\Resources\UserCollection;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::paginate(10);
        return new UserCollection($users);
    }

    public function store(UserStoreRequest $request)
    {
        $user = User::create([
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'type'     => $request->type,
        ]);

        return (new UserResource($user))
            ->response()
            ->setStatusCode(201);
    }

    public function show(User $user)
    {
        return new UserResource($user);
    }

    public function update(UserUpdateRequest $request, User $user)
    {
        $data = $request->only(['username', 'type']);

        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        $user->update($data);
        return (new UserResource($user))->additional([
            'meta' => [
                'message' => 'Profil berhasil diperbarui!',
                'status' => 'success'
            ]
        ])->response()->setStatusCode(200);
    }

    public function destroy(User $user)
    {
        $user->delete();
        return response()->json(['message' => 'User berhasil dihapus'], 200);
    }
}
