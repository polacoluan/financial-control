<?php

namespace App\Containers\AppSection\Transaction\UI\API\Controllers;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\AppSection\Transaction\Actions\GetMonthlySummaryAction;
use App\Containers\AppSection\Transaction\UI\API\Requests\GetMonthlySummaryRequest;
use App\Containers\AppSection\Transaction\UI\API\Transformers\MonthlySummaryTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Prettus\Repository\Exceptions\RepositoryException;

class GetMonthlySummaryController extends ApiController
{
    /**
     * @throws InvalidTransformerException
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function GetMonthlySummary(GetMonthlySummaryRequest $request, GetMonthlySummaryAction $action): mixed
    {
        $summary = $action->run($request);

        return response()->json(
            fractal()->item($summary, new MonthlySummaryTransformer())->toArray()
        );
    }
}
