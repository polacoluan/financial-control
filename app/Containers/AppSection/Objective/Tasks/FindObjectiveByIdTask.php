<?php

namespace App\Containers\AppSection\Objective\Tasks;

use App\Containers\AppSection\Objective\Data\Repositories\ObjectiveRepository;
use App\Containers\AppSection\Objective\Events\ObjectiveRequested;
use App\Containers\AppSection\Objective\Models\Objective;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task as ParentTask;

class FindObjectiveByIdTask extends ParentTask
{
    public function __construct(
        private readonly ObjectiveRepository $repository,
    ) {
    }

    /**
     * @throws NotFoundException
     */
    public function run($id): Objective
    {
        try {
            $objective = $this->repository->find($id);
            ObjectiveRequested::dispatch($objective);

            return $objective;
        } catch (\Exception) {
            throw new NotFoundException();
        }
    }
}
