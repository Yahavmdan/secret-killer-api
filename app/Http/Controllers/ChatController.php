<?php

namespace App\Http\Controllers;

use App\Events\Message;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function message(Request $request)
    {
        $message = $request->input('message');
        $userName = $request->input('userName');
        return event(new Message($message, $userName));
    }
}
