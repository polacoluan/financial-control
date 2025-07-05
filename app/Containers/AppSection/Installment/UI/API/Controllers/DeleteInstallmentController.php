<?php

namespace App\Containers\AppSection\Installment\UI\API\Controllers;

use App\Containers\AppSection\Installment\Actions\DeleteInstallmentAction;
use App\Containers\AppSection\Installment\UI\API\Requests\DeleteInstallmentRequest;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Controllers\ApiController;
use Illuminate\Http\JsonResponse;

class DeleteInstallmentController extends ApiController
{
    /**
     * @throws DeleteResourceFailedException
     * @throws NotFoundException
     */
    public function __invoke(DeleteInstallmentRequest $request, DeleteInstallmentAction $action): JsonResponse
    {
        $action->run($request);

        return $this->noContent();
    }
}
