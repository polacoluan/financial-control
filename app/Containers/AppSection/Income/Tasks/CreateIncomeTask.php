<?php

namespace App\Containers\AppSection\Income\Tasks;

use App\Containers\AppSection\Income\Data\Repositories\IncomeRepository;
use App\Containers\AppSection\Income\Events\IncomeCreated;
use App\Containers\AppSection\Income\Models\Income;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task as ParentTask;

class CreateIncomeTask extends ParentTask
{
    public function __construct(
        private readonly IncomeRepository $repository,
    ) {
    }

    /**
     * @throws CreateResourceFailedException
     */
    public function run(array $data): Income
    {
        try {
            $income = $this->repository->create($data);
            IncomeCreated::dispatch($income);

            return $income;
        } catch (\Exception) {
            throw new CreateResourceFailedException();
        }
    }
}
