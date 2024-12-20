<?php

namespace App\Containers\AppSection\Income\Tasks;

use App\Containers\AppSection\Income\Data\Repositories\IncomeRepository;
use App\Containers\AppSection\Income\Events\IncomeDeleted;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task as ParentTask;

class DeleteIncomeTask extends ParentTask
{
    public function __construct(
        private readonly IncomeRepository $repository,
    ) {
    }

    /**
     * @throws DeleteResourceFailedException
     * @throws NotFoundException
     */
    public function run($id): bool
    {
        $result = $this->repository->delete($id);
        IncomeDeleted::dispatch($result);

        return $result;
    }
}
