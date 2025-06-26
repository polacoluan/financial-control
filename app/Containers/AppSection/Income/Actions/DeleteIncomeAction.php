<?php

namespace App\Containers\AppSection\Income\Actions;

use App\Containers\AppSection\Income\Tasks\DeleteIncomeTask;
use App\Containers\AppSection\Income\UI\API\Requests\DeleteIncomeRequest;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Actions\Action as ParentAction;

class DeleteIncomeAction extends ParentAction
{
    public function __construct(
        private readonly DeleteIncomeTask $deleteIncomeTask,
    ) {
    }

    /**
     * @throws DeleteResourceFailedException
     * @throws NotFoundException
     */
    public function run(DeleteIncomeRequest $request): int
    {
        return $this->deleteIncomeTask->run($request->id);
    }
}
