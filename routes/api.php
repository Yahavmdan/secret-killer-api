<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


//public routes
Route::post('/sign-in', [UserController::class, 'store']);
Route::post('/login', [UserController::class, 'login']);
Route::post('/check/token', [AuthController::class, 'checkToken']);


//protected routes
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::post('/messages', [ChatController::class, 'message']);
    Route::post('/session/store', [SessionController::class, 'store']);
});

