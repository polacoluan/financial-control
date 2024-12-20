<?php

namespace App\Containers\AppSection\Objective\Tasks;

use App\Containers\AppSection\Objective\Data\Repositories\ObjectiveRepository;
use App\Containers\AppSection\Objective\Events\ObjectiveUpdated;
use App\Containers\AppSection\Objective\Models\Objective;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class UpdateObjectiveTask extends ParentTask
{
    public function __construct(
        private readonly ObjectiveRepository $repository,
    ) {
    }

    /**
     * @throws NotFoundException
     * @throws UpdateResourceFailedException
     */
    public function run(array $data, $id): Objective
    {
        try {
            $objective = $this->repository->update($data, $id);
            ObjectiveUpdated::dispatch($objective);

            return $objective;
        } catch (ModelNotFoundException) {
            throw new NotFoundException();
        } catch (\Exception) {
            throw new UpdateResourceFailedException();
        }
    }
}
