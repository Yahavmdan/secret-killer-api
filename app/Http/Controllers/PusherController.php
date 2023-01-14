<?php

namespace App\Http\Controllers;

use App\Events\MessageEvent;
use App\Events\SessionEvent;
use App\Http\Requests\ChatRequest;
use App\Models\Session;
use Carbon\Carbon;

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

}
