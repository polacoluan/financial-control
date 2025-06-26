<?php

namespace App\Containers\AppSection\Type\Actions;

use App\Containers\AppSection\Type\Tasks\DeleteTypeTask;
use App\Containers\AppSection\Type\UI\API\Requests\DeleteTypeRequest;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Actions\Action as ParentAction;

class DeleteTypeAction extends ParentAction
{
    public function __construct(
        private readonly DeleteTypeTask $deleteTypeTask,
    ) {
    }

    /**
     * @throws DeleteResourceFailedException
     * @throws NotFoundException
     */
    public function run(DeleteTypeRequest $request): int
    {
        return $this->deleteTypeTask->run($request->id);
    }
}
