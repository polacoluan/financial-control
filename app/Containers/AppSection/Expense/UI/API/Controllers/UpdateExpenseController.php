<?php

namespace App\Containers\AppSection\Expense\UI\API\Controllers;

use Apiato\Core\Exceptions\IncorrectIdException;
use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\AppSection\Expense\Actions\UpdateExpenseAction;
use App\Containers\AppSection\Expense\UI\API\Requests\UpdateExpenseRequest;
use App\Containers\AppSection\Expense\UI\API\Transformers\ExpenseTransformer;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Controllers\ApiController;

class UpdateExpenseController extends ApiController
{
    /**
     * @throws InvalidTransformerException
     * @throws UpdateResourceFailedException
     * @throws IncorrectIdException
     * @throws NotFoundException
     */
    public function __invoke(UpdateExpenseRequest $request, UpdateExpenseAction $action): array
    {
        $expense = $action->run($request);

        return $this->transform($expense, ExpenseTransformer::class);
    }
}
