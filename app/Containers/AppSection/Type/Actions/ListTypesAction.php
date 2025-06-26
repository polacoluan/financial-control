<?php

namespace App\Containers\AppSection\Type\Actions;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\AppSection\Type\Tasks\ListTypesTask;
use App\Containers\AppSection\Type\UI\API\Requests\ListTypesRequest;
use App\Ship\Parents\Actions\Action as ParentAction;
use Prettus\Repository\Exceptions\RepositoryException;

class ListTypesAction extends ParentAction
{
    public function __construct(
        private readonly ListTypesTask $listTypesTask,
    ) {
    }

    /**
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function run(ListTypesRequest $request): mixed
    {
        return $this->listTypesTask->run();
    }
}
