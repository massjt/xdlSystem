<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use App\Models\Question;

class QuestionViewCount
{
    use InteractsWithSockets, SerializesModels;

    public $question;
    public $client_ip;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Question $question,$client_ip)
    {
        $this->question = $question;
        $this->client_ip = $client_ip;
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
