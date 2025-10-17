<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Контроллер для регистрации/авторизации/выхода пользователя
use \App\Http\Controllers\UserController;

// Контроллер для лунных миссий
use \App\Http\Controllers\MissionController;

// Контроллер для всех полетов
use \App\Http\Controllers\FlightController;

Route::post('/registration', [UserController::class, 'register']);
Route::post('/authorization', [UserController::class, 'login']);

// Если вошел в аккаунт разрешается:
Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::get('/logout', [UserController::class, 'logout']);

    Route::get('/api/gagarin-flight', [FlightController::class, 'show_gagarin_flight']);

    // Рейсы
    Route::get('/flight', [FlightController::class, 'index_flight']);
    Route::post('/space-flights', [FlightController::class, 'store_space_flights']);
    Route::get('/space-flights', [FlightController::class, 'index_space_flights']);
    Route::post('/book-flight', [FlightController::class, 'store_book_flight']);


    // Лунные миссии
    Route::post('/lunar-missions', [MissionController::class, 'store']);

    //Route::get('/lunar-missions', [MissionController::class, 'show']);
    //Route::delete('/lunar-missions/{mission_id}', [MissionController::class, 'destroy']);
    //Route::path('/lunar-missions/{mission_id}', [MissionController::class, 'update']);
    //Route::post('/lunar-watermark', [MissionController::class, 'watermarkStore']);

    //Route::get('/search', [InfoController::class, 'show']);
});