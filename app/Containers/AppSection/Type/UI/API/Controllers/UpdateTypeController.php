<?php

namespace App\Containers\AppSection\Type\UI\API\Controllers;

use Apiato\Core\Exceptions\IncorrectIdException;
use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\AppSection\Type\Actions\UpdateTypeAction;
use App\Containers\AppSection\Type\UI\API\Requests\UpdateTypeRequest;
use App\Containers\AppSection\Type\UI\API\Transformers\TypeTransformer;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Controllers\ApiController;

class UpdateTypeController extends ApiController
{
    /**
     * @throws InvalidTransformerException
     * @throws UpdateResourceFailedException
     * @throws IncorrectIdException
     * @throws NotFoundException
     */
    public function __invoke(UpdateTypeRequest $request, UpdateTypeAction $action): array
    {
        $type = $action->run($request);

        return $this->transform($type, TypeTransformer::class);
    }
}
