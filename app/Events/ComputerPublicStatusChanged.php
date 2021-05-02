<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use App\Models\Computer;
use Illuminate\Support\Facades\Log;

class ComputerPublicStatusChanged implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * The computer instance.
     *
     * @var \App\Models\Computer
     */
    public $computer;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Computer $computer)
    {
        Log::alert($computer);

        $this->computer = $computer;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return ['public-computers'];
    }

    public function broadcastAs()
    {
        return 'status-changed';
    }
}
