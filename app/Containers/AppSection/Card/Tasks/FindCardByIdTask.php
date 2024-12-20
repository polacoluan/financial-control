<?php

namespace App\Containers\AppSection\Card\Tasks;

use App\Containers\AppSection\Card\Data\Repositories\CardRepository;
use App\Containers\AppSection\Card\Events\CardRequested;
use App\Containers\AppSection\Card\Models\Card;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task as ParentTask;

class FindCardByIdTask extends ParentTask
{
    public function __construct(
        private readonly CardRepository $repository,
    ) {
    }

    /**
     * @throws NotFoundException
     */
    public function run($id): Card
    {
        try {
            $card = $this->repository->find($id);
            CardRequested::dispatch($card);

            return $card;
        } catch (\Exception) {
            throw new NotFoundException();
        }
    }
}
