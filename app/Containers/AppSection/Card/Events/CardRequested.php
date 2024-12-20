<?php

namespace App\Containers\AppSection\Card\Events;

use App\Containers\AppSection\Card\Models\Card;
use App\Ship\Parents\Events\Event as ParentEvent;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\PrivateChannel;

class CardRequested extends ParentEvent
{
    public function __construct(
        public readonly Card $card,
    ) {
    }

    /**
     * @return Channel[]
     */
    public function broadcastOn(): array
    {
        return [
            new PrivateChannel('channel-name'),
        ];
    }
}
