<?php

namespace App\Containers\AppSection\Card\Tasks;

use App\Containers\AppSection\Card\Data\Repositories\CardRepository;
use App\Containers\AppSection\Card\Events\CardCreated;
use App\Containers\AppSection\Card\Models\Card;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task as ParentTask;

class CreateCardTask extends ParentTask
{
    public function __construct(
        private readonly CardRepository $repository,
    ) {
    }

    /**
     * @throws CreateResourceFailedException
     */
    public function run(array $data): Card
    {
        try {
            $card = $this->repository->create($data);
            CardCreated::dispatch($card);

            return $card;
        } catch (\Exception) {
            throw new CreateResourceFailedException();
        }
    }
}
