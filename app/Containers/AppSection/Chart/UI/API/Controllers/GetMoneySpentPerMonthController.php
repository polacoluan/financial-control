<?php

namespace App\Containers\AppSection\Chart\UI\API\Controllers;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\AppSection\Chart\Actions\GetMoneySpentPerMonthAction;
use App\Containers\AppSection\Chart\UI\API\Requests\GetMoneySpentPerMonthRequest;
use App\Containers\AppSection\Chart\UI\API\Transformers\ChartTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Prettus\Repository\Exceptions\RepositoryException;

class GetMoneySpentPerMonthController extends ApiController
{
    /**
     * @throws InvalidTransformerException
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function GetMoneySpentPerMonth(GetMoneySpentPerMonthRequest $request, GetMoneySpentPerMonthAction $action): mixed
    {
        $charts = $action->run($request);

        return response()->json(fractal()->item($charts, new ChartTransformer())->toArray());
        // return $this->transform($charts, ChartTransformer::class);
    }
}
