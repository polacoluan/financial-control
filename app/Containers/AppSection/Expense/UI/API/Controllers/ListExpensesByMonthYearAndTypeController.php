<?php

namespace App\Containers\AppSection\Expense\UI\API\Controllers;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\AppSection\Expense\Actions\ListExpensesByMonthYearAndTypeAction;
use App\Containers\AppSection\Expense\UI\API\Requests\ListExpensesByMonthYearAndTypeRequest;
use App\Containers\AppSection\Expense\UI\API\Transformers\ExpenseTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Prettus\Repository\Exceptions\RepositoryException;

class ListExpensesByMonthYearAndTypeController extends ApiController
{
    /**
     * @throws InvalidTransformerException
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function __invoke(ListExpensesByMonthYearAndTypeRequest $request, ListExpensesByMonthYearAndTypeAction $action): mixed
    {
        $expenses = $action->run($request);

        return response()->json(
            fractal()
                ->collection($expenses, new ExpenseTransformer())
                ->toArray()
        );
    }
}
