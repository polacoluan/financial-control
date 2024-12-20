<?php

namespace App\Containers\AppSection\Income\UI\API\Controllers;

use Apiato\Core\Exceptions\IncorrectIdException;
use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\AppSection\Income\Actions\CreateIncomeAction;
use App\Containers\AppSection\Income\UI\API\Requests\CreateIncomeRequest;
use App\Containers\AppSection\Income\UI\API\Transformers\IncomeTransformer;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Controllers\ApiController;
use Illuminate\Http\JsonResponse;

class CreateIncomeController extends ApiController
{
    /**
     * @throws CreateResourceFailedException
     * @throws InvalidTransformerException
     * @throws IncorrectIdException
     */
    public function __invoke(CreateIncomeRequest $request, CreateIncomeAction $action): JsonResponse
    {
        $income = $action->run($request);

        return $this->created($this->transform($income, IncomeTransformer::class));
    }
}
