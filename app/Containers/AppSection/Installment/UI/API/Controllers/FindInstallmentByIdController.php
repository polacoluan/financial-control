<?php

namespace App\Containers\AppSection\Installment\UI\API\Controllers;

use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\AppSection\Installment\Actions\FindInstallmentByIdAction;
use App\Containers\AppSection\Installment\UI\API\Requests\FindInstallmentByIdRequest;
use App\Containers\AppSection\Installment\UI\API\Transformers\InstallmentTransformer;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Controllers\ApiController;

class FindInstallmentByIdController extends ApiController
{
    /**
     * @throws InvalidTransformerException
     * @throws NotFoundException
     */
    public function __invoke(FindInstallmentByIdRequest $request, FindInstallmentByIdAction $action): array
    {
        $installment = $action->run($request);

        return $this->transform($installment, InstallmentTransformer::class);
    }
}
