<?php

namespace App\Containers\AppSection\Objective\Tasks;

use App\Containers\AppSection\Objective\Data\Repositories\ObjectiveRepository;
use App\Containers\AppSection\Objective\Events\ObjectiveDeleted;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task as ParentTask;

class DeleteObjectiveTask extends ParentTask
{
    public function __construct(
        private readonly ObjectiveRepository $repository,
    ) {
    }

    /**
     * @throws DeleteResourceFailedException
     * @throws NotFoundException
     */
    public function run($id): bool
    {
        $result = $this->repository->delete($id);
        ObjectiveDeleted::dispatch($result);

        return $result;
    }
}
