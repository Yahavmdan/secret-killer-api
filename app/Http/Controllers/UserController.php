<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserLoginRequest;
use App\Http\Requests\UserSignInRequest;
use App\Models\User;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function store(UserSignInRequest $request)
    {
        $attemptedEmail = User::where('email', $request['email'])->first();
        if ($attemptedEmail) {
            return response(['message' => 'User already exist'], 400);
        }

        $user = User::create([
            'user_name' =>   $request['userName'],
            'email'     =>   $request['email'],
            'password'  =>   bcrypt($request['password']),
        ]);

        $token = $user->createToken($user->id)->plainTextToken;

        $response = [
            'user'  => $user,
            'token' => $token,
        ];

        return response(collect($response), 200);
    }


    public function login(UserLoginRequest $request)
    {
        $user = User::where('email', $request['email'])->first();

        if (!$user) {
            return response(collect(['message' => 'One of the details is wrong']), 400);
        }

        if (!Hash::check($request['password'], $user->password)) {
            return response(['message' => 'One of the details is wrong'], 400);
        }

        $token = $user->createToken($user->id)->plainTextToken;

        $response = [
            'user'  => $user,
            'token' => $token,
        ];

        return response(collect($response), 200);
    }
}
