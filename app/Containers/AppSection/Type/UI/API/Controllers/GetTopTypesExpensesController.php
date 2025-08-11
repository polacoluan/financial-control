<?php

namespace App\Containers\AppSection\Type\UI\API\Controllers;

use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\AppSection\Type\Actions\GetTopTypesExpensesAction;
use App\Containers\AppSection\Type\UI\API\Requests\GetTopTypesExpensesRequest;
use App\Containers\AppSection\Type\UI\API\Transformers\TypeExpenseTransformer;
use App\Ship\Parents\Controllers\ApiController;

class GetTopTypesExpensesController extends ApiController
{
    /**
     * @throws InvalidTransformerException
     */
    public function __invoke(GetTopTypesExpensesRequest $request, GetTopTypesExpensesAction $action): mixed
    {
        $types = $action->run($request);

        return response()->json(
            fractal()
                ->collection($types, new TypeExpenseTransformer())
                ->toArray()
        );
    }
}
