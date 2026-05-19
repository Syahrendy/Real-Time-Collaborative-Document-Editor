<?php

namespace App\Events;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class CursorMovedEvent implements ShouldBroadcastNow
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $documentId;
    public $userId;
    public $userName;
    public $position;

    public function __construct($documentId, $userId, $userName, $position)
    {
        $this->documentId = $documentId;
        $this->userId = $userId;
        $this->userName = $userName;
        $this->position = $position;
    }

    public function broadcastOn(): array
    {
        return [
            new PresenceChannel('document.' . $this->documentId),
        ];
    }
}