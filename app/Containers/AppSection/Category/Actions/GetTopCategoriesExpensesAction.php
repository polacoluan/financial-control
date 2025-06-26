<?php

namespace App\Containers\AppSection\Category\Actions;

use App\Containers\AppSection\Category\Tasks\GetTopCategoriesExpensesTask;
use App\Containers\AppSection\Category\UI\API\Requests\GetTopCategoriesExpensesRequest;
use App\Ship\Parents\Actions\Action as ParentAction;

class GetTopCategoriesExpensesAction extends ParentAction
{
    public function __construct(
        private readonly GetTopCategoriesExpensesTask $getTopCategoriesExpensesTask
    ) {}

    public function run(GetTopCategoriesExpensesRequest $request): array
    {
        return $this->getTopCategoriesExpensesTask->run(
            (int) $request->month,
            (int) $request->year
        );
    }
}
