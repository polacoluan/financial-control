<?php

namespace App\Containers\AppSection\Card\UI\API\Controllers;

use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\AppSection\Card\Actions\GetTopCardExpensesAction;
use App\Containers\AppSection\Card\UI\API\Requests\GetTopCardExpensesRequest;
use App\Containers\AppSection\Card\UI\API\Transformers\CardExpenseTransformer;
use App\Ship\Parents\Controllers\ApiController;

class GetTopCardExpensesController extends ApiController
{
    /**
     * @throws InvalidTransformerException
     */
    public function __invoke(GetTopCardExpensesRequest $request, GetTopCardExpensesAction $action): mixed
    {
        $cards = $action->run($request);

        return response()->json(
            fractal()
                ->collection($cards, new CardExpenseTransformer())
                ->toArray()
        );
    }
}
