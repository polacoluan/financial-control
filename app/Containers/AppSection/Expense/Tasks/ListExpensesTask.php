<?php

namespace App\Containers\AppSection\Expense\Tasks;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\AppSection\Expense\Data\Repositories\ExpenseRepository;
use App\Containers\AppSection\Expense\Events\ExpensesListed;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Prettus\Repository\Exceptions\RepositoryException;

class ListExpensesTask extends ParentTask
{
    public function __construct(
        private readonly ExpenseRepository $repository,
    ) {
    }

    /**
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function run(): mixed
    {
        $result = $this->repository->addRequestCriteria()->paginate();
        ExpensesListed::dispatch($result);

        return $result;
    }
}
