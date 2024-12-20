<?php

namespace App\Containers\AppSection\Income\Tasks;

use App\Containers\AppSection\Income\Data\Repositories\IncomeRepository;
use App\Containers\AppSection\Income\Events\IncomeUpdated;
use App\Containers\AppSection\Income\Models\Income;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class UpdateIncomeTask extends ParentTask
{
    public function __construct(
        private readonly IncomeRepository $repository,
    ) {
    }

    /**
     * @throws NotFoundException
     * @throws UpdateResourceFailedException
     */
    public function run(array $data, $id): Income
    {
        try {
            $income = $this->repository->update($data, $id);
            IncomeUpdated::dispatch($income);

            return $income;
        } catch (ModelNotFoundException) {
            throw new NotFoundException();
        } catch (\Exception) {
            throw new UpdateResourceFailedException();
        }
    }
}
