<?php

namespace App\Containers\AppSection\Category\UI\API\Controllers;

use App\Containers\AppSection\Category\Actions\DeleteCategoryAction;
use App\Containers\AppSection\Category\UI\API\Requests\DeleteCategoryRequest;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Controllers\ApiController;
use Illuminate\Http\JsonResponse;

class DeleteCategoryController extends ApiController
{
    /**
     * @throws DeleteResourceFailedException
     * @throws NotFoundException
     */
    public function __invoke(DeleteCategoryRequest $request, DeleteCategoryAction $action): JsonResponse
    {
        $action->run($request);

        return $this->noContent();
    }
}
