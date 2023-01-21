<?php

namespace App\Http\Controllers;

use App\Events\MessageEvent;
use App\Events\SessionEvent;
use App\Events\UserSessionEvent;
use App\Http\Requests\ChatRequest;
use App\Models\Session;
use Carbon\Carbon;
use Illuminate\Support\Collection;

class PusherController extends Controller
{
    public function newChatMessage(ChatRequest $request): ?array
    {
        $message = $request->get('message');
        $userName = $request->get('userName');
        $time = Carbon::now()->setTimezone('GMT+2')->format('H:i');

        return event(new MessageEvent($message, $userName, $time));
    }

    public static function newSession(Session $session): ?array
    {
        return event(new SessionEvent($session));
    }

    public static function newUserSession(Collection $users, int $sessionId): ?array
    {
        return event(new UserSessionEvent($users, $sessionId));
    }

}
