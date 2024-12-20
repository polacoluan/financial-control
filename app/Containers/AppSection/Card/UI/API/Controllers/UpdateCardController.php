<?php

namespace App\Containers\AppSection\Card\UI\API\Controllers;

use Apiato\Core\Exceptions\IncorrectIdException;
use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\AppSection\Card\Actions\UpdateCardAction;
use App\Containers\AppSection\Card\UI\API\Requests\UpdateCardRequest;
use App\Containers\AppSection\Card\UI\API\Transformers\CardTransformer;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Controllers\ApiController;

class UpdateCardController extends ApiController
{
    /**
     * @throws InvalidTransformerException
     * @throws UpdateResourceFailedException
     * @throws IncorrectIdException
     * @throws NotFoundException
     */
    public function __invoke(UpdateCardRequest $request, UpdateCardAction $action): array
    {
        $card = $action->run($request);

        return $this->transform($card, CardTransformer::class);
    }
}
