<?php

namespace App\Containers\AppSection\Type\UI\API\Controllers;

use App\Containers\AppSection\Type\Actions\DeleteTypeAction;
use App\Containers\AppSection\Type\UI\API\Requests\DeleteTypeRequest;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Controllers\ApiController;
use Illuminate\Http\JsonResponse;

class DeleteTypeController extends ApiController
{
    /**
     * @throws DeleteResourceFailedException
     * @throws NotFoundException
     */
    public function __invoke(DeleteTypeRequest $request, DeleteTypeAction $action): JsonResponse
    {
        $action->run($request);

        return $this->noContent();
    }
}
