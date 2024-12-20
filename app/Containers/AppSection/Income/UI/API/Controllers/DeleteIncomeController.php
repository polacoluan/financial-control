<?php

namespace App\Containers\AppSection\Income\UI\API\Controllers;

use App\Containers\AppSection\Income\Actions\DeleteIncomeAction;
use App\Containers\AppSection\Income\UI\API\Requests\DeleteIncomeRequest;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Controllers\ApiController;
use Illuminate\Http\JsonResponse;

class DeleteIncomeController extends ApiController
{
    /**
     * @throws DeleteResourceFailedException
     * @throws NotFoundException
     */
    public function __invoke(DeleteIncomeRequest $request, DeleteIncomeAction $action): JsonResponse
    {
        $action->run($request);

        return $this->noContent();
    }
}
