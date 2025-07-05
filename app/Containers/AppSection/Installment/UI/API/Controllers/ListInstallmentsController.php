<?php

namespace App\Containers\AppSection\Installment\UI\API\Controllers;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\AppSection\Installment\Actions\ListInstallmentsAction;
use App\Containers\AppSection\Installment\UI\API\Requests\ListInstallmentsRequest;
use App\Containers\AppSection\Installment\UI\API\Transformers\InstallmentTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Prettus\Repository\Exceptions\RepositoryException;

class ListInstallmentsController extends ApiController
{
    /**
     * @throws InvalidTransformerException
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function __invoke(ListInstallmentsRequest $request, ListInstallmentsAction $action): array
    {
        $installments = $action->run($request);

        return $this->transform($installments, InstallmentTransformer::class);
    }
}
