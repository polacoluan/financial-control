<?php

namespace App\Containers\AppSection\Card\UI\API\Controllers;

use Apiato\Core\Exceptions\IncorrectIdException;
use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\AppSection\Card\Actions\CreateCardAction;
use App\Containers\AppSection\Card\UI\API\Requests\CreateCardRequest;
use App\Containers\AppSection\Card\UI\API\Transformers\CardTransformer;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Controllers\ApiController;
use Illuminate\Http\JsonResponse;

class CreateCardController extends ApiController
{
    /**
     * @throws CreateResourceFailedException
     * @throws InvalidTransformerException
     * @throws IncorrectIdException
     */
    public function __invoke(CreateCardRequest $request, CreateCardAction $action): JsonResponse
    {
        $card = $action->run($request);

        return $this->created($this->transform($card, CardTransformer::class));
    }
}
