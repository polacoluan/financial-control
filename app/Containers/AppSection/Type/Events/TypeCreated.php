<?php

namespace App\Containers\AppSection\Type\Events;

use App\Containers\AppSection\Type\Models\Type;
use App\Ship\Parents\Events\Event as ParentEvent;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\PrivateChannel;

class TypeCreated extends ParentEvent
{
    public function __construct(
        public readonly Type $type,
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
