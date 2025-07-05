<?php

namespace App\Containers\AppSection\Installment\UI\API\Controllers;

use Apiato\Core\Exceptions\IncorrectIdException;
use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\AppSection\Installment\Actions\CreateInstallmentAction;
use App\Containers\AppSection\Installment\UI\API\Requests\CreateInstallmentRequest;
use App\Containers\AppSection\Installment\UI\API\Transformers\InstallmentTransformer;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Controllers\ApiController;
use Illuminate\Http\JsonResponse;

class CreateInstallmentController extends ApiController
{
    /**
     * @throws CreateResourceFailedException
     * @throws InvalidTransformerException
     * @throws IncorrectIdException
     */
    public function __invoke(CreateInstallmentRequest $request, CreateInstallmentAction $action): JsonResponse
    {
        $installment = $action->run($request);

        return $this->created($this->transform($installment, InstallmentTransformer::class));
    }
}
