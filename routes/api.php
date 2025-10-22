<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Контроллер для регистрации/авторизации/выхода пользователя
use \App\Http\Controllers\UserController;

// Контроллер для лунных миссий
use \App\Http\Controllers\MissionController;

// Контроллер для всех полетов
use \App\Http\Controllers\FlightController;

use \App\Http\Controllers\SearchController;

Route::post('/registration', [UserController::class, 'register']);
Route::post('/authorization', [UserController::class, 'login']);

// Если вошел в аккаунт разрешается:
Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::get('/logout', [UserController::class, 'logout']);

    // Статичные данные
    Route::get('/api/gagarin-flight', [FlightController::class, 'get_gagarin_flight']);
    Route::get('/flight', [FlightController::class, 'get_flight']);

    // Рейсы
    Route::post('/space-flights', [FlightController::class, 'store_space_flights']);
    Route::get('/space-flights', [FlightController::class, 'index_space_flights']);
    Route::post('/book-flight', [FlightController::class, 'store_book_flight']);

    // Миссии
    Route::post('/lunar-missions', [MissionController::class, 'store']);
    Route::get('/lunar-missions', [MissionController::class, 'index']);
    Route::delete('/lunar-missions/{mission_id}', [MissionController::class, 'destroy']);
    Route::put('/lunar-missions/{mission_id}', [MissionController::class, 'update']);
    
    // Поиск по миссиям и пилотам
    Route::get('/search', [SearchController::class, 'search']);


    // Изображение с водяным знаком <- Разрешаю себе не делать
    //Route::post('/lunar-watermark', [MissionController::class, 'watermarkStore']);
});