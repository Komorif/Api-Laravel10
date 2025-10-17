<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\UpdateUserRequest;

use App\Http\Requests\RegisterUserRequest;
use App\Http\Requests\LoginUserRequest;

use App\Http\Resources\RegisterUserResource;
use App\Http\Resources\LoginUserResource;
use Auth;

class UserController extends Controller
{
    // Регистрация
    public function register(RegisterUserRequest $request)
    {
        $user = new User($request->all());
        $user->save();
        return response(new RegisterUserResource($user), 201);
    }

    // Авторизация
    public function login(LoginUserRequest $request)
    {
        if (Auth::attempt($request->only("email", "password"))) {
            $user = Auth::user();
            $user->tokens()->delete();

            return response(new LoginUserResource($user), 200);
        }
        
        return response()->json([
            ["message"=> "Неверный email или пароль"]
        ], 401);
    }

    // Выход
    public function logout()
    {
        Auth::user()->currentAccessToken()->delete();
        return response()->noContent(204);
    }
}
