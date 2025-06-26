<?php

namespace App\Containers\AppSection\Type\UI\API\Controllers;

use Apiato\Core\Exceptions\IncorrectIdException;
use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\AppSection\Type\Actions\CreateTypeAction;
use App\Containers\AppSection\Type\UI\API\Requests\CreateTypeRequest;
use App\Containers\AppSection\Type\UI\API\Transformers\TypeTransformer;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Controllers\ApiController;
use Illuminate\Http\JsonResponse;

class CreateTypeController extends ApiController
{
    /**
     * @throws CreateResourceFailedException
     * @throws InvalidTransformerException
     * @throws IncorrectIdException
     */
    public function __invoke(CreateTypeRequest $request, CreateTypeAction $action): JsonResponse
    {
        $type = $action->run($request);

        return $this->created($this->transform($type, TypeTransformer::class));
    }
}
