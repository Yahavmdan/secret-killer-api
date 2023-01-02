<?php

namespace App\Events;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class Message implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public function __construct(
        public $message,
        public $userName,
        public $time
    ) {}

    public function broadcastOn(): array
    {
        return ['secret-killer'];
    }

    public function broadcastAs(): string
    {
        return 'message';
    }
}
