<?php

namespace App\Containers\AppSection\Expense\Actions;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\AppSection\Expense\Tasks\GetExpenseWithInstallmentsTask;
use App\Containers\AppSection\Expense\UI\API\Requests\GetExpenseWithInstallmentsRequest;
use App\Ship\Parents\Actions\Action as ParentAction;
use Prettus\Repository\Exceptions\RepositoryException;

class GetExpenseWithInstallmentsAction extends ParentAction
{
    public function __construct(
        private readonly GetExpenseWithInstallmentsTask $GetExpenseWithInstallmentsTask,
    ) {}

    /**
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function run(GetExpenseWithInstallmentsRequest $request): mixed
    {
        return $this->GetExpenseWithInstallmentsTask->run(
            (int) $request->month,
            (int) $request->type_id
        );
    }
}
