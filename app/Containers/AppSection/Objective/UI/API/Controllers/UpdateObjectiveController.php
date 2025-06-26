<?php

namespace App\Containers\AppSection\Objective\UI\API\Controllers;

use Apiato\Core\Exceptions\IncorrectIdException;
use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\AppSection\Objective\Actions\UpdateObjectiveAction;
use App\Containers\AppSection\Objective\UI\API\Requests\UpdateObjectiveRequest;
use App\Containers\AppSection\Objective\UI\API\Transformers\ObjectiveTransformer;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Controllers\ApiController;

class UpdateObjectiveController extends ApiController
{
    /**
     * @throws InvalidTransformerException
     * @throws UpdateResourceFailedException
     * @throws IncorrectIdException
     * @throws NotFoundException
     */
    public function __invoke(UpdateObjectiveRequest $request, UpdateObjectiveAction $action): array
    {
        $objective = $action->run($request);

        return $this->transform($objective, ObjectiveTransformer::class);
    }
}
