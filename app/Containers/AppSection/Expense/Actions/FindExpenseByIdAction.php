<?php

namespace App\Containers\AppSection\Expense\Actions;

use App\Containers\AppSection\Expense\Models\Expense;
use App\Containers\AppSection\Expense\Tasks\FindExpenseByIdTask;
use App\Containers\AppSection\Expense\UI\API\Requests\FindExpenseByIdRequest;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Actions\Action as ParentAction;

class FindExpenseByIdAction extends ParentAction
{
    public function __construct(
        private readonly FindExpenseByIdTask $findExpenseByIdTask,
    ) {
    }

    /**
     * @throws NotFoundException
     */
    public function run(FindExpenseByIdRequest $request): Expense
    {
        return $this->findExpenseByIdTask->run($request->id);
    }
}
