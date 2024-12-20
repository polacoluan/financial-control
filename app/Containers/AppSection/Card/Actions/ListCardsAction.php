<?php

namespace App\Containers\AppSection\Card\Actions;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\AppSection\Card\Tasks\ListCardsTask;
use App\Containers\AppSection\Card\UI\API\Requests\ListCardsRequest;
use App\Ship\Parents\Actions\Action as ParentAction;
use Prettus\Repository\Exceptions\RepositoryException;

class ListCardsAction extends ParentAction
{
    public function __construct(
        private readonly ListCardsTask $listCardsTask,
    ) {
    }

    /**
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function run(ListCardsRequest $request): mixed
    {
        return $this->listCardsTask->run();
    }
}
