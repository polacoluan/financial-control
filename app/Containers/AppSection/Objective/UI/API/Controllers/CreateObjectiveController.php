<?php

namespace App\Containers\AppSection\Objective\UI\API\Controllers;

use Apiato\Core\Exceptions\IncorrectIdException;
use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\AppSection\Objective\Actions\CreateObjectiveAction;
use App\Containers\AppSection\Objective\UI\API\Requests\CreateObjectiveRequest;
use App\Containers\AppSection\Objective\UI\API\Transformers\ObjectiveTransformer;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Controllers\ApiController;
use Illuminate\Http\JsonResponse;

class CreateObjectiveController extends ApiController
{
    /**
     * @throws CreateResourceFailedException
     * @throws InvalidTransformerException
     * @throws IncorrectIdException
     */
    public function __invoke(CreateObjectiveRequest $request, CreateObjectiveAction $action): JsonResponse
    {
        $objective = $action->run($request);

        return $this->created($this->transform($objective, ObjectiveTransformer::class));
    }
}
