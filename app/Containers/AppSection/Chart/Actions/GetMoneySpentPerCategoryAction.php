<?php

namespace App\Containers\AppSection\Chart\Actions;

use App\Containers\AppSection\Chart\Models\Chart;
use App\Containers\AppSection\Chart\UI\API\Requests\GetMoneySpentPerCategoryRequest;
use App\Containers\AppSection\Expense\Tasks\ListExpensesTask;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Actions\Action as ParentAction;

class GetMoneySpentPerCategoryAction extends ParentAction
{
    public function __construct(
        private readonly ListExpensesTask $listExpensesTask,
    ) {
    }

    /**
     * @throws NotFoundException
     */
    public function run(GetMoneySpentPerCategoryRequest $request): Chart
    {
        return $this->listExpensesTask->run($request->id);
    }
}
