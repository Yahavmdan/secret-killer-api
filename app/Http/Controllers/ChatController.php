<?php

namespace App\Http\Controllers;

use App\Events\Message;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function message(Request $request)
    {
        $message = $request->input('message');
        $userName = $request->input('userName');
        $time = Carbon::now()->addHours(2)->toDateTimeString();

        return event(new Message($message, $userName, $time));
    }
}
