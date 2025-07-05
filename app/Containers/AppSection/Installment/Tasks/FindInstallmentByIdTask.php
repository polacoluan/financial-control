<?php

namespace App\Containers\AppSection\Installment\Tasks;

use App\Containers\AppSection\Installment\Data\Repositories\InstallmentRepository;
use App\Containers\AppSection\Installment\Models\Installment;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task as ParentTask;

class FindInstallmentByIdTask extends ParentTask
{
    public function __construct(
        private readonly InstallmentRepository $repository,
    ) {
    }

    /**
     * @throws NotFoundException
     */
    public function run($id): Installment
    {
        try {
            return $this->repository->find($id);
        } catch (\Exception) {
            throw new NotFoundException();
        }
    }
}
