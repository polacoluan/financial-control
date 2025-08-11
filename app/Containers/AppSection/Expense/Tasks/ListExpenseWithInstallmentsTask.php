<?php

namespace App\Containers\AppSection\Expense\Tasks;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\AppSection\Expense\Data\Repositories\ExpenseRepository;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Prettus\Repository\Exceptions\RepositoryException;

class ListExpenseWithInstallmentsTask extends ParentTask
{
    public function __construct(
        private readonly ExpenseRepository $repository,
    ) {}

    /**
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function run(string $start, string $end): mixed
    {
        return $this->repository
            ->where('date', '>=', $start)
            ->where('date', '<=', $end)
            ->where('expenses.installment_id', '<>', null)
            ->join('installments', 'expenses.installment_id', '=', 'installments.installment_id')
            ->get();
    }
}
