<?php

namespace App\Http\Controllers;

use App\Http\Requests\DeleteSessionRequest;
use App\Http\Requests\EnterSessionRequest;
use App\Http\Requests\StoreSessionRequest;
use App\Models\Session;
use App\Models\User;
use App\Models\UserSession;
use Illuminate\Http\Response;

class SessionController extends Controller
{

    public function index(): Response
    {
        $sessions = Session::all();
        collect($sessions);
        if (!count($sessions)) {
            return response(['message' => 'No sessions'], 400);
        }
        return response($sessions, 200);
    }

    public function store(StoreSessionRequest $request): Response
    {
        $isExist = Session::where('creator_id', $request->get('userId'))->first();
        error_log($isExist);
        if ($isExist) {
            return response(['message' => 'Each user can create only one session at the time'], 400);
        }
        $session = Session::create([
            'name' => $request->get('name'),
            'creator_id' => $request->get('userId'),
            'creator_name' => User::where('id', $request->get('userId'))->select('user_name AS userName')->first()->userName
        ]);

        PusherController::newSession($session);

        return response($session, 200);
    }

    public function delete(DeleteSessionRequest $request): Response
    {
        $session    = Session::where('id' , $request->get('sessionId'))->first();
        $user       = $request->user();
        if ($session->creator_id === $user->id) {
            Session::destroy($request->get('sessionId'));
            return response(['message' => 'Session deleted'], 200);
        }
        return response(['message' => 'Session can be deleted only by the creator'], 400);
    }

    public function enter(EnterSessionRequest $request): Response
    {
        $sessionId = $request->get('sessionId');
        $userId = $request->get('userId');

        $userSession = UserSession::create([
            'session_id' => $sessionId,
            'user_id'     => $userId
        ]);

        return response($userSession, 200);
    }

}
