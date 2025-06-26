<?php

namespace App\Containers\AppSection\Income\Tasks;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\AppSection\Income\Data\Repositories\IncomeRepository;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Prettus\Repository\Exceptions\RepositoryException;

class ListIncomesByMonthTask extends ParentTask
{
    public function __construct(
        private readonly IncomeRepository $repository,
    ) {}

    /**
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function run($month): mixed
    {
        return $this->repository->whereMonth('date', $month)->get();
    }
}
