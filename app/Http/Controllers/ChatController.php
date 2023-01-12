<?php

namespace App\Http\Controllers;

use App\Events\Message;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function message(Request $request)
    {
        $message = $request->get('message');
        $userName = $request->get('userName');
        $time = Carbon::now()->setTimezone('GMT+2')->format('H:i');

        return event(new Message($message, $userName, $time));
    }
}
