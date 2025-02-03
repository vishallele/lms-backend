<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisteredUserController extends Controller
{
    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): JsonResponse
    {

        $request->validate([
            'full_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => [
                'required',
                'confirmed',
                Rules\Password::defaults()
            ],
        ]);

        try {
            $user = User::create([
                'full_name' => $request->full_name,
                'auth_type' => $request->auth_type,
                'email' => $request->email,
                'password' => Hash::make($request->string('password')),
            ]);

            if (!$user) {
                throw new Exception("Failed to create account", 500);
            }

            $user->UserAuthMeta()->create([
                'user_external_id' => $request->user_external_id,
                'access_token' => $request->access_token,
                'refresh_token' => $request->refresh_token,
                'id_token' => $request->id_token,
            ]);

            event(new Registered($user));

            return response()->json([
                'uid' => $user->id
            ], 200);
        } catch (Exception $e) {
            return response()->json(['message' => $e->getMessage(), 'code' => '500'], 500);
        }
    }

    public function getUserByEmail($email)
    {
        $exist = User::where('email', $email)->exists();
        return response()->json([
            'isUserExist' => $exist
        ], 200);
    }
}
