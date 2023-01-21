<?php

namespace App\Events;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Collection;

class UserSessionEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public function __construct(
        public Collection $users,
        public int $sessionId
    ) {}

    public function broadcastOn(): array
    {
        return ['secret-killer'];
    }

    public function broadcastAs(): string
    {
        return 'userSession';
    }
}
