<?php

namespace App\Containers\AppSection\Installment\UI\API\Controllers;

use Apiato\Core\Exceptions\IncorrectIdException;
use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\AppSection\Installment\Actions\UpdateInstallmentAction;
use App\Containers\AppSection\Installment\UI\API\Requests\UpdateInstallmentRequest;
use App\Containers\AppSection\Installment\UI\API\Transformers\InstallmentTransformer;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Controllers\ApiController;

class UpdateInstallmentController extends ApiController
{
    /**
     * @throws InvalidTransformerException
     * @throws UpdateResourceFailedException
     * @throws IncorrectIdException
     * @throws NotFoundException
     */
    public function __invoke(UpdateInstallmentRequest $request, UpdateInstallmentAction $action): array
    {
        $installment = $action->run($request);

        return $this->transform($installment, InstallmentTransformer::class);
    }
}
