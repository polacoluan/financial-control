<?php

namespace App\Containers\AppSection\Income\UI\API\Controllers;

use Apiato\Core\Exceptions\IncorrectIdException;
use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\AppSection\Income\Actions\UpdateIncomeAction;
use App\Containers\AppSection\Income\UI\API\Requests\UpdateIncomeRequest;
use App\Containers\AppSection\Income\UI\API\Transformers\IncomeTransformer;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Controllers\ApiController;

class UpdateIncomeController extends ApiController
{
    /**
     * @throws InvalidTransformerException
     * @throws UpdateResourceFailedException
     * @throws IncorrectIdException
     * @throws NotFoundException
     */
    public function __invoke(UpdateIncomeRequest $request, UpdateIncomeAction $action): array
    {
        $income = $action->run($request);

        return $this->transform($income, IncomeTransformer::class);
    }
}
