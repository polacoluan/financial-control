<?php

namespace App\Containers\AppSection\Expense\Tasks;

use App\Containers\AppSection\Expense\Data\Repositories\ExpenseRepository;
use App\Containers\AppSection\Expense\Events\ExpenseRequested;
use App\Containers\AppSection\Expense\Models\Expense;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task as ParentTask;

class FindExpenseByIdTask extends ParentTask
{
    public function __construct(
        private readonly ExpenseRepository $repository,
    ) {
    }

    /**
     * @throws NotFoundException
     */
    public function run($id): Expense
    {
        try {
            $expense = $this->repository->find($id);
            ExpenseRequested::dispatch($expense);

            return $expense;
        } catch (\Exception) {
            throw new NotFoundException();
        }
    }
}
