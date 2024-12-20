<?php

namespace App\Containers\AppSection\Expense\UI\API\Controllers;

use App\Containers\AppSection\Expense\Actions\DeleteExpenseAction;
use App\Containers\AppSection\Expense\UI\API\Requests\DeleteExpenseRequest;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Controllers\ApiController;
use Illuminate\Http\JsonResponse;

class DeleteExpenseController extends ApiController
{
    /**
     * @throws DeleteResourceFailedException
     * @throws NotFoundException
     */
    public function __invoke(DeleteExpenseRequest $request, DeleteExpenseAction $action): JsonResponse
    {
        $action->run($request);

        return $this->noContent();
    }
}
