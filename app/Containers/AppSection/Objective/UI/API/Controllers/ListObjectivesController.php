<?php

namespace App\Containers\AppSection\Objective\UI\API\Controllers;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\AppSection\Objective\Actions\ListObjectivesAction;
use App\Containers\AppSection\Objective\UI\API\Requests\ListObjectivesRequest;
use App\Containers\AppSection\Objective\UI\API\Transformers\ObjectiveTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Prettus\Repository\Exceptions\RepositoryException;

class ListObjectivesController extends ApiController
{
    /**
     * @throws InvalidTransformerException
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function __invoke(ListObjectivesRequest $request, ListObjectivesAction $action): array
    {
        $objectives = $action->run($request);

        return $this->transform($objectives, ObjectiveTransformer::class);
    }
}
