<?php

namespace App\Containers\AppSection\Card\Tasks;

use App\Containers\AppSection\Card\Data\Repositories\CardRepository;
use App\Containers\AppSection\Card\Events\CardDeleted;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task as ParentTask;

class DeleteCardTask extends ParentTask
{
    public function __construct(
        private readonly CardRepository $repository,
    ) {
    }

    /**
     * @throws DeleteResourceFailedException
     * @throws NotFoundException
     */
    public function run($id): bool
    {
        $result = $this->repository->delete($id);
        CardDeleted::dispatch($result);

        return $result;
    }
}
