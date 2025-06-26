<?php

namespace App\Containers\AppSection\Type\UI\API\Controllers;

use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\AppSection\Type\Actions\FindTypeByIdAction;
use App\Containers\AppSection\Type\UI\API\Requests\FindTypeByIdRequest;
use App\Containers\AppSection\Type\UI\API\Transformers\TypeTransformer;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Controllers\ApiController;

class FindTypeByIdController extends ApiController
{
    /**
     * @throws InvalidTransformerException
     * @throws NotFoundException
     */
    public function __invoke(FindTypeByIdRequest $request, FindTypeByIdAction $action): array
    {
        $type = $action->run($request);

        return $this->transform($type, TypeTransformer::class);
    }
}
