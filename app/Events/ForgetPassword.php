<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

/**
 * Class ForgetPassword
 * @property array credentials
 *
 * @package App\Events
 */
class ForgetPassword
{

    use Dispatchable;
    use InteractsWithSockets;
    use SerializesModels;

    /**
     * @var array
     */
    public $credentials;


    /**
     * Create a new event instance.
     *
     * @param array $credentials
     */
    public function __construct(array $credentials)
    {
        $this->credentials = $credentials;
    }


    /**
     * Get the channels the event should broadcast on.
     *
     * @return Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}

