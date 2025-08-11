<?php

namespace App\Containers\AppSection\Income\Tasks;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\AppSection\Income\Data\Repositories\IncomeRepository;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Prettus\Repository\Exceptions\RepositoryException;

class ListIncomesByRangeDateTask extends ParentTask
{
    public function __construct(
        private readonly IncomeRepository $repository,
    ) {}

    /**
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function run(string $start, string  $end): mixed
    {
        return $this->repository->where('date', '>=', $start)->where('date', '<=', $end)->get();
    }
}
