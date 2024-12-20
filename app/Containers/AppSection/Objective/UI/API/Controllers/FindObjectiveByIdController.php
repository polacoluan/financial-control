<?php

namespace App\Containers\AppSection\Objective\UI\API\Controllers;

use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\AppSection\Objective\Actions\FindObjectiveByIdAction;
use App\Containers\AppSection\Objective\UI\API\Requests\FindObjectiveByIdRequest;
use App\Containers\AppSection\Objective\UI\API\Transformers\ObjectiveTransformer;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Controllers\ApiController;

class FindObjectiveByIdController extends ApiController
{
    /**
     * @throws InvalidTransformerException
     * @throws NotFoundException
     */
    public function __invoke(FindObjectiveByIdRequest $request, FindObjectiveByIdAction $action): array
    {
        $objective = $action->run($request);

        return $this->transform($objective, ObjectiveTransformer::class);
    }
}
