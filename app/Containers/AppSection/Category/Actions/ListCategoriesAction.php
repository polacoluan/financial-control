<?php

namespace App\Containers\AppSection\Category\Actions;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\AppSection\Category\Tasks\ListCategoriesTask;
use App\Containers\AppSection\Category\UI\API\Requests\ListCategoriesRequest;
use App\Ship\Parents\Actions\Action as ParentAction;
use Prettus\Repository\Exceptions\RepositoryException;

class ListCategoriesAction extends ParentAction
{
    public function __construct(
        private readonly ListCategoriesTask $listCategoriesTask,
    ) {
    }

    /**
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function run(ListCategoriesRequest $request): mixed
    {
        return $this->listCategoriesTask->run();
    }
}
