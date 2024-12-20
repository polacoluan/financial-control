<?php

namespace App\Containers\AppSection\Expense\Tasks;

use App\Containers\AppSection\Expense\Data\Repositories\ExpenseRepository;
use App\Containers\AppSection\Expense\Events\ExpenseCreated;
use App\Containers\AppSection\Expense\Models\Expense;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task as ParentTask;

class CreateExpenseTask extends ParentTask
{
    public function __construct(
        private readonly ExpenseRepository $repository,
    ) {
    }

    /**
     * @throws CreateResourceFailedException
     */
    public function run(array $data): Expense
    {
        try {
            $expense = $this->repository->create($data);
            ExpenseCreated::dispatch($expense);

            return $expense;
        } catch (\Exception) {
            throw new CreateResourceFailedException();
        }
    }
}
