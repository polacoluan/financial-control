<?php

namespace App\Containers\AppSection\Income\Tasks;

use App\Containers\AppSection\Income\Data\Repositories\IncomeRepository;
use App\Containers\AppSection\Income\Events\IncomeRequested;
use App\Containers\AppSection\Income\Models\Income;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task as ParentTask;

class FindIncomeByIdTask extends ParentTask
{
    public function __construct(
        private readonly IncomeRepository $repository,
    ) {
    }

    /**
     * @throws NotFoundException
     */
    public function run($id): Income
    {
        try {
            $income = $this->repository->find($id);
            IncomeRequested::dispatch($income);

            return $income;
        } catch (\Exception) {
            throw new NotFoundException();
        }
    }
}
