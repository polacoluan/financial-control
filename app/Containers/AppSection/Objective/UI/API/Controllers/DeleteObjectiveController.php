<?php

namespace App\Containers\AppSection\Objective\UI\API\Controllers;

use App\Containers\AppSection\Objective\Actions\DeleteObjectiveAction;
use App\Containers\AppSection\Objective\UI\API\Requests\DeleteObjectiveRequest;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Controllers\ApiController;
use Illuminate\Http\JsonResponse;

class DeleteObjectiveController extends ApiController
{
    /**
     * @throws DeleteResourceFailedException
     * @throws NotFoundException
     */
    public function __invoke(DeleteObjectiveRequest $request, DeleteObjectiveAction $action): JsonResponse
    {
        $action->run($request);

        return $this->noContent();
    }
}
