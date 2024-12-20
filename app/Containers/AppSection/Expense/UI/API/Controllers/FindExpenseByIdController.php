<?php

namespace App\Containers\AppSection\Expense\UI\API\Controllers;

use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\AppSection\Expense\Actions\FindExpenseByIdAction;
use App\Containers\AppSection\Expense\UI\API\Requests\FindExpenseByIdRequest;
use App\Containers\AppSection\Expense\UI\API\Transformers\ExpenseTransformer;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Controllers\ApiController;

class FindExpenseByIdController extends ApiController
{
    /**
     * @throws InvalidTransformerException
     * @throws NotFoundException
     */
    public function __invoke(FindExpenseByIdRequest $request, FindExpenseByIdAction $action): array
    {
        $expense = $action->run($request);

        return $this->transform($expense, ExpenseTransformer::class);
    }
}
