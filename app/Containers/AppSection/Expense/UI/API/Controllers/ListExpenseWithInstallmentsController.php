<?php

namespace App\Containers\AppSection\Expense\UI\API\Controllers;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\AppSection\Expense\Actions\ListExpenseWithInstallmentsAction;
use App\Containers\AppSection\Expense\UI\API\Requests\ListExpenseWithInstallmentsRequest;
use App\Containers\AppSection\Expense\UI\API\Transformers\ListExpenseWithInstallmentsTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Prettus\Repository\Exceptions\RepositoryException;

class ListExpenseWithInstallmentsController extends ApiController
{
    /**
     * @throws InvalidTransformerException
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function __invoke(ListExpenseWithInstallmentsRequest $request, ListExpenseWithInstallmentsAction $action): array
    {
        $expenses = $action->run($request);

        return $this->transform($expenses, ListExpenseWithInstallmentsTransformer::class);
    }
}
