<?php

namespace App\Containers\AppSection\Card\UI\API\Controllers;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\AppSection\Card\Actions\ListCardsAction;
use App\Containers\AppSection\Card\UI\API\Requests\ListCardsRequest;
use App\Containers\AppSection\Card\UI\API\Transformers\CardTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Prettus\Repository\Exceptions\RepositoryException;

class ListCardsController extends ApiController
{
    /**
     * @throws InvalidTransformerException
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function __invoke(ListCardsRequest $request, ListCardsAction $action): array
    {
        $cards = $action->run($request);

        return $this->transform($cards, CardTransformer::class);
    }
}
