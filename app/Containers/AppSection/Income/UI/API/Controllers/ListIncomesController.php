<?php

namespace App\Containers\AppSection\Income\UI\API\Controllers;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\AppSection\Income\Actions\ListIncomesAction;
use App\Containers\AppSection\Income\UI\API\Requests\ListIncomesRequest;
use App\Containers\AppSection\Income\UI\API\Transformers\IncomeTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Prettus\Repository\Exceptions\RepositoryException;

class ListIncomesController extends ApiController
{
    /**
     * @throws InvalidTransformerException
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function __invoke(ListIncomesRequest $request, ListIncomesAction $action): array
    {
        $incomes = $action->run($request);

        return $this->transform($incomes, IncomeTransformer::class);
    }
}
