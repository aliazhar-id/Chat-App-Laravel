<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class SendMessage implements ShouldBroadcast
{
  use Dispatchable, InteractsWithSockets, SerializesModels;
  public $id_room, $id_user, $message;

  /**
   * Create a new event instance.
   */
  public function __construct($id_room, $id_user, $message)
  {
    $this->id_room = $id_room;
    $this->id_user = $id_user;
    $this->message = $message;
  }

  /**
   * Get the channels the event should broadcast on.
   *
   * @return array<int, \Illuminate\Broadcasting\Channel>
   */
  public function broadcastOn(): array
  {
    return [
      new PresenceChannel('chat.' . $this->id_room),
    ];
  }
}
