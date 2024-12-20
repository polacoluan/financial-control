<?php

namespace App\Containers\AppSection\Income\Actions;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\AppSection\Income\Tasks\ListIncomesTask;
use App\Containers\AppSection\Income\UI\API\Requests\ListIncomesRequest;
use App\Ship\Parents\Actions\Action as ParentAction;
use Prettus\Repository\Exceptions\RepositoryException;

class ListIncomesAction extends ParentAction
{
    public function __construct(
        private readonly ListIncomesTask $listIncomesTask,
    ) {
    }

    /**
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function run(ListIncomesRequest $request): mixed
    {
        return $this->listIncomesTask->run();
    }
}
