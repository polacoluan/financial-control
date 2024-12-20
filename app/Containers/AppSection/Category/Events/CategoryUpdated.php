<?php

namespace App\Containers\AppSection\Category\Events;

use App\Containers\AppSection\Category\Models\Category;
use App\Ship\Parents\Events\Event as ParentEvent;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\PrivateChannel;

class CategoryUpdated extends ParentEvent
{
    public function __construct(
        public readonly Category $category,
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
