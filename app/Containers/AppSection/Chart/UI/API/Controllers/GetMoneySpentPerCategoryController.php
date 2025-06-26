<?php

namespace App\Containers\AppSection\Chart\UI\API\Controllers;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\AppSection\Chart\Actions\GetMoneySpentPerCategoryAction;
use App\Containers\AppSection\Chart\UI\API\Requests\GetMoneySpentPerCategoryRequest;
use App\Containers\AppSection\Chart\UI\API\Transformers\ChartTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Prettus\Repository\Exceptions\RepositoryException;

class GetMoneySpentPerCategoryController extends ApiController
{
    /**
     * @throws InvalidTransformerException
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function __invoke(GetMoneySpentPerCategoryRequest $request, GetMoneySpentPerCategoryAction $action): array
    {
        $charts = $action->run($request);

        return $this->transform($charts, ChartTransformer::class);
    }
}
