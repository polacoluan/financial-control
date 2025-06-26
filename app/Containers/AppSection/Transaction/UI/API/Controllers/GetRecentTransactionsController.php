<?php

namespace App\Containers\AppSection\Transaction\UI\API\Controllers;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\AppSection\Transaction\Actions\GetRecentTransactionsAction;
use App\Containers\AppSection\Transaction\UI\API\Requests\GetRecentTransactionsRequest;
use App\Containers\AppSection\Transaction\UI\API\Transformers\TransactionTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Prettus\Repository\Exceptions\RepositoryException;

class GetRecentTransactionsController extends ApiController
{
    /**
     * @throws InvalidTransformerException
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function __invoke(GetRecentTransactionsRequest $request, GetRecentTransactionsAction $action): mixed
    {
        $transactions = $action->run($request);

        return response()->json(
            fractal()
                ->collection($transactions, new TransactionTransformer())
                ->toArray()
        );
    }
}
