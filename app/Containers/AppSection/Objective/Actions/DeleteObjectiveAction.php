<?php

namespace App\Containers\AppSection\Objective\Actions;

use App\Containers\AppSection\Objective\Tasks\DeleteObjectiveTask;
use App\Containers\AppSection\Objective\UI\API\Requests\DeleteObjectiveRequest;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Actions\Action as ParentAction;

class DeleteObjectiveAction extends ParentAction
{
    public function __construct(
        private readonly DeleteObjectiveTask $deleteObjectiveTask,
    ) {
    }

    /**
     * @throws DeleteResourceFailedException
     * @throws NotFoundException
     */
    public function run(DeleteObjectiveRequest $request): int
    {
        return $this->deleteObjectiveTask->run($request->id);
    }
}
