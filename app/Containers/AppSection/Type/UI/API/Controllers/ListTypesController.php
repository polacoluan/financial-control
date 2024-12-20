<?php

namespace App\Containers\AppSection\Type\UI\API\Controllers;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\AppSection\Type\Actions\ListTypesAction;
use App\Containers\AppSection\Type\UI\API\Requests\ListTypesRequest;
use App\Containers\AppSection\Type\UI\API\Transformers\TypeTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Prettus\Repository\Exceptions\RepositoryException;

class ListTypesController extends ApiController
{
    /**
     * @throws InvalidTransformerException
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function __invoke(ListTypesRequest $request, ListTypesAction $action): array
    {
        $types = $action->run($request);

        return $this->transform($types, TypeTransformer::class);
    }
}
