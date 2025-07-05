<?php

namespace App\Containers\AppSection\Expense\UI\API\Controllers;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\AppSection\Expense\Actions\ListExpensesAction;
use App\Containers\AppSection\Expense\UI\API\Requests\ListExpensesRequest;
use App\Containers\AppSection\Expense\UI\API\Transformers\ExpenseTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Prettus\Repository\Exceptions\RepositoryException;

class GetExpenseWithInstallmentsController extends ApiController
{
    /**
     * @throws InvalidTransformerException
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function __invoke(ListExpensesRequest $request, ListExpensesAction $action): array
    {
        $expenses = $action->run($request);

        return $this->transform($expenses, ExpenseTransformer::class);
    }
}
