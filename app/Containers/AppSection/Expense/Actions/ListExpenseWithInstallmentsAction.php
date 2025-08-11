<?php

namespace App\Containers\AppSection\Expense\Actions;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\AppSection\Expense\Tasks\ListExpenseWithInstallmentsTask;
use App\Containers\AppSection\Expense\UI\API\Requests\ListExpenseWithInstallmentsRequest;
use App\Ship\Parents\Actions\Action as ParentAction;
use Prettus\Repository\Exceptions\RepositoryException;

class ListExpenseWithInstallmentsAction extends ParentAction
{
    public function __construct(
        private readonly ListExpenseWithInstallmentsTask $GetExpenseWithInstallmentsTask,
    ) {}

    public function run(ListExpenseWithInstallmentsRequest $request): mixed
    {
        return $this->GetExpenseWithInstallmentsTask->run(
            (string) $request->start,
            (string) $request->end
        );
    }
}
