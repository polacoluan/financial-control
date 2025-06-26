<?php

namespace App\Containers\AppSection\Expense\Tasks;

use App\Containers\AppSection\Expense\Data\Repositories\ExpenseRepository;
use App\Containers\AppSection\Expense\Events\ExpenseDeleted;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task as ParentTask;

class DeleteExpenseTask extends ParentTask
{
    public function __construct(
        private readonly ExpenseRepository $repository,
    ) {
    }

    /**
     * @throws DeleteResourceFailedException
     * @throws NotFoundException
     */
    public function run($id): bool
    {
        $result = $this->repository->delete($id);
        ExpenseDeleted::dispatch($result);

        return $result;
    }
}
