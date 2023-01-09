<?php

namespace App\Http\Controllers;

use App\Http\Requests\SessionRequest;
use App\Models\Session;
use App\Models\User;
use Illuminate\Http\Response;

class SessionController extends Controller
{
    public function store(SessionRequest $request): Response
    {
        $session = Session::create([
            'name' =>   $request['name'],
        ]);

        $response = [
            'session'   => $session,
            'user'      => User::where('id', $request->get('userId'))->select('email', 'id', 'user_name AS userName')->first(),
        ];

        return response($response, 200);
    }
}
