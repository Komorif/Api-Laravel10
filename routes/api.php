<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Контроллер для регистрации/авторизации/выхода пользователя
use \App\Http\Controllers\UserController;

// Контроллер для лунных миссий
use \App\Http\Controllers\MissionsController;

// Контроллер для всех полетов
use \App\Http\Controllers\FlightsController;

Route::post('/registration', [UserController::class, 'register']);
Route::post('/authorization', [UserController::class, 'login']);

// Если вошел в аккаунт разрешается:
Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::get('/logout', [UserController::class, 'logout']);
    Route::get('/gagarin-flight', [FlightsController::class, 'show_gagarin_flight']);



    // Лунные миссии
    Route::post('/lunar-missions', [MissionsController::class, 'store']);



    
    // Рейсы
    Route::get('/flight', [FlightsController::class, 'show_flight']);

    Route::post('/space-flights', [FlightsController::class, 'store_space_flights']);
    Route::get('/space-flights', [FlightsController::class, 'show_space_flights']);
    Route::post('/book-flight', [FlightsController::class, 'store_book_flight']);

    //Route::get('/search', [InfoController::class, 'show']);

    // Лунные миссии
    //Route::post('/lunar-missions', [MissionsController::class, 'store']); - сверху уже есть

    //Route::get('/lunar-missions', [LunarMissionController::class, 'show']);
    //Route::delete('/lunar-missions/{mission_id}', [LunarMissionController::class, 'destroy']);
    //Route::path('/lunar-missions/{mission_id}', [LunarMissionController::class, 'update']);
    //Route::post('/lunar-watermark', [LunarMissionController::class, 'watermarkStore']);
});