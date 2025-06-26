<?php

namespace App\Containers\AppSection\Objective\Tasks;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\AppSection\Objective\Data\Repositories\ObjectiveRepository;
use App\Containers\AppSection\Objective\Events\ObjectivesListed;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Prettus\Repository\Exceptions\RepositoryException;

class ListObjectivesTask extends ParentTask
{
    public function __construct(
        private readonly ObjectiveRepository $repository,
    ) {
    }

    /**
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function run(): mixed
    {
        $result = $this->repository->addRequestCriteria()->paginate();
        ObjectivesListed::dispatch($result);

        return $result;
    }
}
