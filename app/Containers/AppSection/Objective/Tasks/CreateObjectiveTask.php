<?php

namespace App\Containers\AppSection\Objective\Tasks;

use App\Containers\AppSection\Objective\Data\Repositories\ObjectiveRepository;
use App\Containers\AppSection\Objective\Events\ObjectiveCreated;
use App\Containers\AppSection\Objective\Models\Objective;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task as ParentTask;

class CreateObjectiveTask extends ParentTask
{
    public function __construct(
        private readonly ObjectiveRepository $repository,
    ) {
    }

    /**
     * @throws CreateResourceFailedException
     */
    public function run(array $data): Objective
    {
        try {
            $objective = $this->repository->create($data);
            ObjectiveCreated::dispatch($objective);

            return $objective;
        } catch (\Exception) {
            throw new CreateResourceFailedException();
        }
    }
}
