<?php

namespace App\Containers\AppSection\Card\UI\API\Controllers;

use App\Containers\AppSection\Card\Actions\DeleteCardAction;
use App\Containers\AppSection\Card\UI\API\Requests\DeleteCardRequest;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Controllers\ApiController;
use Illuminate\Http\JsonResponse;

class DeleteCardController extends ApiController
{
    /**
     * @throws DeleteResourceFailedException
     * @throws NotFoundException
     */
    public function __invoke(DeleteCardRequest $request, DeleteCardAction $action): JsonResponse
    {
        $action->run($request);

        return $this->noContent();
    }
}
