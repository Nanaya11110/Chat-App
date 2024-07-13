<?php

namespace App\Events;

use App\Models\messenge;
use App\Models\User;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class SendMessage implements ShouldBroadcastNow
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $user;
    public $message;
    public $conversationId;
    public $type;
    public function __construct(User $user, messenge $messenge, $convId,$type)
    {
        $this->type = $type;
        $this->message = $messenge;
        $this->user = $user;
        $this->conversationId = $convId;
    }

    public function broadcastWith(): array
    {
        return 
        [
            'messageId' => $this->message->id,
            'id' => $this->user->id,
            'conId' =>$this->conversationId,
            'type' =>$this->type,
        ];
    }

    public function broadcastOn(): array
    {
        return [new Channel('user.' . $this->user->id)];
    }
}
