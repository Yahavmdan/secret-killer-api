<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Laravel\Sanctum\PersonalAccessToken;

class AuthController extends Controller
{
    public function checkToken(Request $request): bool
    {
        $token = $request->getContent();

        if ($token) {
            $tokenExist = PersonalAccessToken::findToken($token);
            if ($tokenExist) {
                return true;


            }
        }
        return false;
    }
}
