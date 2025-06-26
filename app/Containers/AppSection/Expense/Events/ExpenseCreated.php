<?php

namespace App\Containers\AppSection\Expense\Events;

use App\Containers\AppSection\Expense\Models\Expense;
use App\Ship\Parents\Events\Event as ParentEvent;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\PrivateChannel;

class ExpenseCreated extends ParentEvent
{
    public function __construct(
        public readonly Expense $expense,
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
