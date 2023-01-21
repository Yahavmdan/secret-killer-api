<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PusherController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


//public routes
Route::post('/signup', [UserController::class, 'store']);
Route::post('/login', [UserController::class, 'login']);



//protected routes
Route::group(['middleware' => ['auth:sanctum', 'ability:all']], function () {

    //token
    Route::post('/check/token', [AuthController::class, 'checkToken']);

    //chat
    Route::post('/messages', [PusherController::class, 'newChatMessage']);

    //sessions
    Route::get('/sessions/index', [SessionController::class, 'index']);
    Route::get('/sessions/{sessionId}', [SessionController::class, 'getUsersSessionById']);
    Route::post('/session/store', [SessionController::class, 'store']);
    Route::post('/session/delete', [SessionController::class, 'delete']);
    Route::post('/session/enter', [SessionController::class, 'enter']);
    Route::post('/session/exit', [SessionController::class, 'exit']);
    Route::get('/session/{userId}', [SessionController::class, 'getSessionByUserId']);

});

