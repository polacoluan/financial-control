<?php

namespace App\Containers\AppSection\Category\UI\API\Controllers;

use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\AppSection\Category\Actions\GetTopCategoriesExpensesAction;
use App\Containers\AppSection\Category\UI\API\Requests\GetTopCategoriesExpensesRequest;
use App\Containers\AppSection\Category\UI\API\Transformers\CategoryExpenseTransformer;
use App\Ship\Parents\Controllers\ApiController;

class GetTopCategoriesExpensesController extends ApiController
{
    /**
     * @throws InvalidTransformerException
     */
    public function __invoke(GetTopCategoriesExpensesRequest $request, GetTopCategoriesExpensesAction $action): array
    {
        $categories = $action->run($request);

        return $this->transform($categories, CategoryExpenseTransformer::class);
    }
}
