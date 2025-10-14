<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Контроллер для регистрации/авторизации/выхода пользователя
use \App\Http\Controllers\UserController;

// Контроллер для лунных миссий
use \App\Http\Controllers\LunarMissionController;

// Контроллер для всех полетов
use \App\Http\Controllers\FlightsController;



//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::post('/registration', [UserController::class, 'register']);
Route::post('/authorization', [UserController::class, 'login']);

// Если вошел в аккаунт разрешается:
Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::get('/logout', [UserController::class, 'logout']);
});






//Route::get('/gagarin-flight', [\App\Http\Controllers\Api\V1\FlightsController::class, 'show']);

//Route::get('/flight', [FlightsController::class, 'show']);

// Лунные миссии
//Route::get('/lunar-missions', [LunarMissionController::class, 'show']);
//Route::post('/lunar-missions', [LunarMissionController::class, 'store']);
////Route::delete('/lunar-missions/{mission_id}', [LunarMissionController::class, 'destroy']);
////Route::path('/lunar-missions/{mission_id}', [LunarMissionController::class, 'update']);
//Route::post('/lunar-watermark', [LunarMissionController::class, 'watermarkStore']);
//
//// Рейсы
//Route::post('/space-flights', [FlightsController::class, 'store']);
//Route::get('/space-flights', [FlightsController::class, 'show']);
//Route::post('/book-flight', [FlightsController::class, 'bookStore']);
//
//Route::get('/search', [InfoController::class, 'show']);
