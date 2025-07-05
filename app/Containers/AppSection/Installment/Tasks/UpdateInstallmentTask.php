<?php

namespace App\Containers\AppSection\Installment\Tasks;

use App\Containers\AppSection\Installment\Data\Repositories\InstallmentRepository;
use App\Containers\AppSection\Installment\Models\Installment;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class UpdateInstallmentTask extends ParentTask
{
    public function __construct(
        private readonly InstallmentRepository $repository,
    ) {
    }

    /**
     * @throws NotFoundException
     * @throws UpdateResourceFailedException
     */
    public function run(array $data, $id): Installment
    {
        try {
            return $this->repository->update($data, $id);
        } catch (ModelNotFoundException) {
            throw new NotFoundException();
        } catch (\Exception) {
            throw new UpdateResourceFailedException();
        }
    }
}
