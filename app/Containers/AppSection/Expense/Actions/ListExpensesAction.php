<?php

namespace App\Containers\AppSection\Expense\Actions;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\AppSection\Expense\Tasks\ListExpensesTask;
use App\Containers\AppSection\Expense\UI\API\Requests\ListExpensesRequest;
use App\Ship\Parents\Actions\Action as ParentAction;
use Prettus\Repository\Exceptions\RepositoryException;

class ListExpensesAction extends ParentAction
{
    public function __construct(
        private readonly ListExpensesTask $listExpensesTask,
    ) {
    }

    /**
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function run(ListExpensesRequest $request): mixed
    {
        return $this->listExpensesTask->run();
    }
}
