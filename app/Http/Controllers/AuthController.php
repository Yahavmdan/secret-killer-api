<?php

namespace App\Http\Controllers;

use App\Http\Requests\checkTokenRequest;
use Illuminate\Http\Response;
use Laravel\Sanctum\PersonalAccessToken;

class AuthController extends Controller
{
    public function checkToken(checkTokenRequest $request): Response
    {
        $token = $request->get('token');
        $userId = $request->get('userId');

        if (!$token) {
            return response( ['message' => 'No token'], 400);
        }

        $tokenExist =
            PersonalAccessToken::where('tokenable_id', $userId)
                ->where('token', $token)
                ->first();

        if ($tokenExist) {
            return response( 1, 200);
        }
        return response( 0, 400);
    }
}
