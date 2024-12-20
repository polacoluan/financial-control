<?php

namespace App\Containers\AppSection\Expense\Actions;

use App\Containers\AppSection\Expense\Tasks\DeleteExpenseTask;
use App\Containers\AppSection\Expense\UI\API\Requests\DeleteExpenseRequest;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Actions\Action as ParentAction;

class DeleteExpenseAction extends ParentAction
{
    public function __construct(
        private readonly DeleteExpenseTask $deleteExpenseTask,
    ) {
    }

    /**
     * @throws DeleteResourceFailedException
     * @throws NotFoundException
     */
    public function run(DeleteExpenseRequest $request): int
    {
        return $this->deleteExpenseTask->run($request->id);
    }
}
