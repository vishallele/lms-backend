<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Hash;

class AuthenticatedSessionController extends Controller
{
    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): JsonResponse
    {

        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $user = User::where('email', $request->email)->first();

        if (! $user || ! Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }
        return response()->json(
            [
                'access_token' => $user->createToken($request->email)->plainTextToken,
                'email' => $user->email,
                'full_name' => $user->full_name,
                'uid' => $user->id
            ],
            200
        );
    }

    /*
    * Goodle and Facebook authentication
    **/
    public function socialAuthentication(Request $request): JsonResponse
    {

        $request->validate([
            'email' => 'required|email',
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user) {

            //if user not found then register user and return data for login
            try {
                $user = User::create([
                    'full_name' => $request->full_name,
                    'auth_type' => $request->auth_type,
                    'email' => $request->email,
                    'password' => ($request->auth_type === 'email') ? Hash::make($request->string('password')) : null,
                ]);

                if (!$user) {
                    throw new \Exception(
                        "Failed to create account",
                        500
                    );
                }

                $user->UserAuthMeta()->create([
                    'user_external_id' => $request->user_external_id,
                    'access_token' => $request->access_token,
                    'refresh_token' => $request->refresh_token,
                    'id_token' => $request->id_token,
                ]);

                event(new Registered($user));

                return response()->json([
                    'access_token' => $user->createToken($request->email)->plainTextToken,
                    'email' => $user->email,
                    'full_name' => $user->full_name,
                    'uid' => $user->id
                ], 200);
            } catch (\Exception $e) {
                return response()->json(['message' => $e->getMessage()], 500);
            }

            //return response()->json(['message' => 'user not found'], 404);
            //return response(['message' => 'user not found'], 404, ['Content/Type' => 'application/json']);
        }

        return response()->json(
            [
                'access_token' => $user->createToken($request->email)->plainTextToken,
                'email' => $user->email,
                'full_name' => $user->full_name,
                'uid' => $user->id
            ],
            200
        );
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): Response
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return response()->noContent();
    }
}
