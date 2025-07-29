<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Traits\ApiResponder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Response;
use App\Helpers\ResponseMessages;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Http\Resources\UserResource;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    use ApiResponder;


    public function register(RegisterRequest $request)
    {
        $user = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
            'role_id'  => $request->role_id,
        ]);

        $token = $user->createToken($request->email)->plainTextToken;

        return $this->success([
            'token' => $token,
            'user'  => $user,
        ], ResponseMessages::REGISTERED(), Response::HTTP_CREATED);
    }

    public function login(LoginRequest $request)
    {
        $credentials = $request->validated();

        $user = User::query()->firstWhere([
            'email'         => $credentials['email'],
        ]);
        if (!$user)
            throw ValidationException::withMessages([
                'email' => [ResponseMessages::USER_NOT_FOUND()]
            ]);

        if (!Auth::attempt($credentials))
            throw ValidationException::withMessages([
                'email' => [ResponseMessages::INVALID_CREDENTIALS()]
            ]);

        if ($user instanceof User) {
            $token =  $user->createToken($user->email)->plainTextToken;

            return $this->success([
                'token' => $token,
                'user'  => new UserResource($user),
            ], ResponseMessages::LOGGED_IN(), Response::HTTP_OK);
        } else {
            return $this->error(ResponseMessages::UNAUTHORIZED(), Response::HTTP_UNAUTHORIZED);
        }
    }



    public function logout(Request $request)
    {
        $user = $request->user();
        $user->currentAccessToken()->delete();
        // $user->firebaseTokens()->delete();
        return $this->success([], ResponseMessages::LOGGED_OUT());
    }

    public function deleteAccount(Request $request)
    {
        $user = $request->user();

        DB::beginTransaction();

        try {
            $user->tokens()->delete();

            if ($user->role_id === 3 && $user->provider) {
                $user->provider->delete();
            }

            // Optional: delete Firebase tokens
            // $user->firebaseTokens()->delete();

            $user->delete();

            DB::commit();

            return $this->success([], ResponseMessages::DELETED(), Response::HTTP_OK);
        } catch (Exception $e) {
            DB::rollBack();
            return $this->error(ResponseMessages::ACCOUNT_DELETION_FAILED(), 500);
        }
    }
}
