<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class SomeEvent implements ShouldBroadcast
{
    use InteractsWithSockets, SerializesModels;
    
    public $chatMessage;
    public $user;
    
    /**
    * Create a new event instance.
    *
    * @return void
    */
    public function __construct($user)
    {
        $this->chatMessage = '$chatMessage';
        $this->user = $user;
        dump($user);
    }
    
    /**
    * Get the channels the event should broadcast on.
    *
    * @return Channel|array
    */
    public function broadcastOn()
    {
        // return [
        // "chat-room.1"
        // ];
        return new PrivateChannel('channel-name');
    }
}