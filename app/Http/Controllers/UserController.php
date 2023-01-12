<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserLoginRequest;
use App\Http\Requests\UserSignInRequest;
use App\Models\User;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\PersonalAccessToken;

class UserController extends Controller
{

    public function store(UserSignInRequest $request): Response
    {
        $user = User::create([
            'user_name' =>   $request['userName'],
            'email'     =>   $request['email'],
            'password'  =>   bcrypt($request['password']),
        ]);

        $token = $user->createToken($user->user_name, ['all'])->plainTextToken;

        $sendUser = [
            'userName' => $user->user_name,
            'id' => $user->id,
            'email' => $user->email,
            'token' => $token
        ];

        return response($sendUser, 200);
    }


    public function login(UserLoginRequest $request): Response
    {
        $user = User::where('email', $request->get('emailOrUserName'))
                ->orWhere('user_name', $request->get('emailOrUserName'))
                ->first();

        if (!$user || !Hash::check($request['password'], $user->password)) {
            return response(['message' => 'One of the details is wrong'], 400);
        }

        $token = $user->createToken($user->user_name, ['all'])->plainTextToken;

        $sendUser = [
            'userName'  => $user->user_name,
            'id'        => $user->id,
            'email'     => $user->email,
            'token'     => $token
        ];

        return response($sendUser, 200);
    }
}
