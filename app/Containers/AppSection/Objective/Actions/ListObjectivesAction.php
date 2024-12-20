<?php

namespace App\Containers\AppSection\Objective\Actions;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\AppSection\Objective\Tasks\ListObjectivesTask;
use App\Containers\AppSection\Objective\UI\API\Requests\ListObjectivesRequest;
use App\Ship\Parents\Actions\Action as ParentAction;
use Prettus\Repository\Exceptions\RepositoryException;

class ListObjectivesAction extends ParentAction
{
    public function __construct(
        private readonly ListObjectivesTask $listObjectivesTask,
    ) {
    }

    /**
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function run(ListObjectivesRequest $request): mixed
    {
        return $this->listObjectivesTask->run();
    }
}
