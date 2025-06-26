<?php

namespace App\Containers\AppSection\Transaction\Actions;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\AppSection\Transaction\Tasks\GetRecentTransactionsTask;
use App\Containers\AppSection\Transaction\UI\API\Requests\GetRecentTransactionsRequest;
use App\Ship\Parents\Actions\Action as ParentAction;
use Prettus\Repository\Exceptions\RepositoryException;

class GetRecentTransactionsAction extends ParentAction
{
    public function __construct(
        private readonly GetRecentTransactionsTask $getRecentTransactionsTask,
    ) {}

    /**
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function run(GetRecentTransactionsRequest $request): mixed
    {
        return $this->getRecentTransactionsTask->run();
    }
}
