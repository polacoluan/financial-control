<?php

namespace App\Containers\AppSection\Objective\Events;

use App\Containers\AppSection\Objective\Models\Objective;
use App\Ship\Parents\Events\Event as ParentEvent;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\PrivateChannel;

class ObjectiveUpdated extends ParentEvent
{
    public function __construct(
        public readonly Objective $objective,
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
