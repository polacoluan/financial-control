<?php

namespace App\Containers\AppSection\Income\Events;

use App\Containers\AppSection\Income\Models\Income;
use App\Ship\Parents\Events\Event as ParentEvent;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\PrivateChannel;

class IncomeCreated extends ParentEvent
{
    public function __construct(
        public readonly Income $income,
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
