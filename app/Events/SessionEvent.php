<?php

namespace App\Events;

use App\Models\Session;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class SessionEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public function __construct(
        public Session $session
    ) {}

    public function broadcastOn(): array
    {
        return ['secret-killer'];
    }

    public function broadcastAs(): string
    {
        return 'session';
    }
}
