<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Laravel\Sanctum\PersonalAccessToken;

class AuthController extends Controller
{
    public function checkToken(Request $request): Response
    {
        $token = $request['token'];
        error_log($token);
        $tokenExist = PersonalAccessToken::findToken($token);
        $user = User::where('id' , $tokenExist->name)->first();
        if ($user) {
            return response(['message' => 'Ok', 'responseCode'  => 1], 200);
        }

        return response(['message' => 'Bad request', 'responseCode' => 2], 400);
    }
}
