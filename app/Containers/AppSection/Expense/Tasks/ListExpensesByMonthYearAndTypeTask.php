<?php

namespace App\Containers\AppSection\Expense\Tasks;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\AppSection\Expense\Data\Repositories\ExpenseRepository;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Prettus\Repository\Exceptions\RepositoryException;

class ListExpensesByMonthYearAndTypeTask extends ParentTask
{
    public function __construct(
        private readonly ExpenseRepository $repository,
    ) {}

    /**
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function run(string $start, string $end, int $typeId): mixed
    {
        return $this->repository
            ->where('date', '>=', $start)
            ->where('date', '<=', $end)
            ->where('type_id', $typeId)
            ->get();
    }
}
