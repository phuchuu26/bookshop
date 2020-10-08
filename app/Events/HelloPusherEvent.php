<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use App\User;
use Illuminate\Support\Facades\Auth;
// use App\Events\Event;


// use App\Event;
// extends Event
class HelloPusherEvent   implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $message;
    public $id;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($message,$id)
    {
        //
        // $this->message = 1;
        $this->message = $message;
        $this->id = $id;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        // console.log()
        // dd('id nguoi nhan.'.$this->id);
        // Private
        return new Channel('phuc.'.$this->id);
        // return new Channel('phuc.'.$id);
        // return new Channel('phuc');
    }
}
