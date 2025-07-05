<?php

namespace App\Containers\AppSection\Expense\Tasks;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\AppSection\Expense\Data\Repositories\ExpenseRepository;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Prettus\Repository\Exceptions\RepositoryException;

class GetExpenseWithInstallmentsTask extends ParentTask
{
    public function __construct(
        private readonly ExpenseRepository $repository,
    ) {}

    /**
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function run(int $year, int $month): mixed
    {
        return $this->repository
            ->whereYear('date', $year)
            ->whereMonth('date', $month)
            ->where('installment_id', '<>', null)
            ->join('installments', 'expenses.id', '=', 'installments.installment_id')
            ->get();
    }
}
