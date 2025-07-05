<?php

namespace App\Containers\AppSection\Installment\Tasks;

use App\Containers\AppSection\Installment\Data\Repositories\InstallmentRepository;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task as ParentTask;

class DeleteInstallmentTask extends ParentTask
{
    public function __construct(
        private readonly InstallmentRepository $repository,
    ) {
    }

    /**
     * @throws DeleteResourceFailedException
     * @throws NotFoundException
     */
    public function run($id): bool
    {
        return $this->repository->delete($id);
    }
}
