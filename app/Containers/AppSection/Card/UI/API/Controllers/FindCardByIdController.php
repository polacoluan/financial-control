<?php

namespace App\Containers\AppSection\Card\UI\API\Controllers;

use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\AppSection\Card\Actions\FindCardByIdAction;
use App\Containers\AppSection\Card\UI\API\Requests\FindCardByIdRequest;
use App\Containers\AppSection\Card\UI\API\Transformers\CardTransformer;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Controllers\ApiController;

class FindCardByIdController extends ApiController
{
    /**
     * @throws InvalidTransformerException
     * @throws NotFoundException
     */
    public function __invoke(FindCardByIdRequest $request, FindCardByIdAction $action): array
    {
        $card = $action->run($request);

        return $this->transform($card, CardTransformer::class);
    }
}
