<?php

namespace App\Containers\AppSection\Objective\Tasks;

use App\Containers\AppSection\Objective\Data\Repositories\ObjectiveRepository;
use App\Ship\Parents\Tasks\Task as ParentTask;

class GetTotalSavedAmountTask extends ParentTask
{
    public function __construct(
        private readonly ObjectiveRepository $repository,
    ) {}

    public function run(): float
    {
        return (float) $this->repository->sum('saved_amount');
    }
}
