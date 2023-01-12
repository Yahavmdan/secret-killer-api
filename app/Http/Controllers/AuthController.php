<?php

namespace App\Http\Controllers;

use App\Http\Requests\checkTokenRequest;
use Illuminate\Http\Response;

class AuthController extends Controller
{
    public function checkToken(checkTokenRequest $request): Response
    {
        $token  = $request->get('token');
        $user   = $request->user();

        if (!$token) {
            return response( ['message' => 'No token'], 400);
        }

        $tokenCan = $user->tokenCan('all');

        if ($tokenCan) {
            return response( 1, 200);
        }
        return response( 0, 400);
    }
}
