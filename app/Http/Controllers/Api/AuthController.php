<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Traits\ApiResponder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Response;
use App\Helpers\ResponseMessages;
use Exception;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    use ApiResponder;

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|string|min:6',
            'role_id'  => 'required|exists:roles,id',
        ]);

        if ($validator->fails()) {
            return $this->error(ResponseMessages::VALIDATION_FAILURE, Response::HTTP_UNPROCESSABLE_ENTITY, $validator->errors());
        }

        $user = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
            'role_id'  => $request->role_id,
        ]);

        $token = $user->createToken($user->email)->plainTextToken;

        return $this->success([
            'token' => $token,
            'user'  => $user,
        ], ResponseMessages::REGISTERED, Response::HTTP_CREATED);
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email'    => 'required|email',
            'password' => 'required|string',
        ]);

        if ($validator->fails()) {
            return $this->error(ResponseMessages::VALIDATION_FAILURE, Response::HTTP_UNPROCESSABLE_ENTITY, $validator->errors());
        }

        if (!Auth::attempt($request->only('email', 'password'))) {
            return $this->error(ResponseMessages::UNAUTHORIZED, Response::HTTP_UNAUTHORIZED);
        }

        $user = Auth::user();
        if ($user instanceof User) {
            $token =  $user->createToken($user->email)->plainTextToken;

            return $this->success([
                'token' => $token,
                'user'  => $user,
            ], ResponseMessages::LOGGED_IN, Response::HTTP_OK);
        } else {
            return $this->error(ResponseMessages::UNAUTHORIZED, Response::HTTP_UNAUTHORIZED);
        }
    }


    public function logout(Request $request)
    {
        $user = $request->user();
        $user->currentAccessToken()->delete();
        // $user->firebaseTokens()->delete();
        return $this->success([], ResponseMessages::LOGGED_OUT);
    }


    public function deleteAccount(Request $request)
    {
        $user = $request->user();

        DB::beginTransaction();

        try {
            $user->tokens()->delete();

            if ($user->provider) {
                $user->provider->delete();
            }

            // $user->firebaseTokens()->delete();

            $user->delete();

            DB::commit();

            return $this->success([], ResponseMessages::DELETED, Response::HTTP_OK);
        } catch (Exception $e) {
            DB::rollBack();
            return $this->error('Account deletion failed.', 500);
        }
    }
}
