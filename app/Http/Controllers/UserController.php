<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Requests\LoginUserRequest;

use Auth;

class UserController extends Controller
{
    public function register(StoreUserRequest $request)
    {
        $user = User::create($request->all());

        return response()->json([
                'data' => [
                    'user' => [
                        'name' => $user->first_name. " ".$user->last_name. " ".$user->patronymic,
                        'email' => $user->email,
                    ],
                    'code' => 201,
                    'message' => 'Пользователь создан',
                ]
            ], 201);
    }

    public function login(LoginUserRequest $request)
    {
        if (Auth::attempt($request->only("email", "password"))) {
            $user = Auth::user();
            $user->tokens()->delete();

            return response()->json([
                'data' => [
                    'user' => [
                        'id' => $user->id,
                        'name' => $user->first_name. " ".$user->last_name. " ".$user->patronymic,
                        'birth_date' => $user->birth_date,
                        'email' => $user->email,
                    ],
                    'token' => $user->createToken("token")->plainTextToken
                ],
            ], 200);
        }
        
        return response()->json([
            ["message"=> "Неверный email или пароль"]
        ], 401);
    }

    public function logout()
    {
        Auth::user()->currentAccessToken()->delete();
        return response()->noContent(204);
    }
}
