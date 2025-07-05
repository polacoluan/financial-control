<?php

namespace App\Containers\AppSection\Installment\Tasks;

use App\Containers\AppSection\Installment\Data\Repositories\InstallmentRepository;
use App\Containers\AppSection\Installment\Models\Installment;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task as ParentTask;

class CreateInstallmentTask extends ParentTask
{
    public function __construct(
        private readonly InstallmentRepository $repository,
    ) {
    }

    /**
     * @throws CreateResourceFailedException
     */
    public function run(array $data): Installment
    {
        try {
            return $this->repository->create($data);
        } catch (\Exception) {
            throw new CreateResourceFailedException();
        }
    }
}
