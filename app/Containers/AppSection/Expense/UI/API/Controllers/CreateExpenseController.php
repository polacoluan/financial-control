<?php

namespace App\Containers\AppSection\Expense\UI\API\Controllers;

use Apiato\Core\Exceptions\IncorrectIdException;
use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\AppSection\Expense\Actions\CreateExpenseAction;
use App\Containers\AppSection\Expense\UI\API\Requests\CreateExpenseRequest;
use App\Containers\AppSection\Expense\UI\API\Transformers\ExpenseTransformer;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Controllers\ApiController;
use Illuminate\Http\JsonResponse;

class CreateExpenseController extends ApiController
{
    /**
     * @throws CreateResourceFailedException
     * @throws InvalidTransformerException
     * @throws IncorrectIdException
     */
    public function __invoke(CreateExpenseRequest $request, CreateExpenseAction $action): JsonResponse
    {
        $expense = $action->run($request);

        return $this->created($this->transform($expense, ExpenseTransformer::class));
    }
}
