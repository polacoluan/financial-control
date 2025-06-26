<?php

namespace App\Containers\AppSection\Income\UI\API\Controllers;

use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\AppSection\Income\Actions\FindIncomeByIdAction;
use App\Containers\AppSection\Income\UI\API\Requests\FindIncomeByIdRequest;
use App\Containers\AppSection\Income\UI\API\Transformers\IncomeTransformer;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Controllers\ApiController;

class FindIncomeByIdController extends ApiController
{
    /**
     * @throws InvalidTransformerException
     * @throws NotFoundException
     */
    public function __invoke(FindIncomeByIdRequest $request, FindIncomeByIdAction $action): array
    {
        $income = $action->run($request);

        return $this->transform($income, IncomeTransformer::class);
    }
}
