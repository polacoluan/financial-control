<?php

namespace App\Containers\AppSection\Expense\Actions;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\AppSection\Expense\Tasks\ListExpensesByMonthYearAndTypeTask;
use App\Containers\AppSection\Expense\UI\API\Requests\ListExpensesByMonthYearAndTypeRequest;
use App\Ship\Parents\Actions\Action as ParentAction;
use Prettus\Repository\Exceptions\RepositoryException;

class ListExpensesByMonthYearAndTypeAction extends ParentAction
{
    public function __construct(
        private readonly ListExpensesByMonthYearAndTypeTask $listExpensesByMonthYearAndTypeTask,
    ) {}

    /**
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function run(ListExpensesByMonthYearAndTypeRequest $request): mixed
    {
        return $this->listExpensesByMonthYearAndTypeTask->run(
            (string) $request->start,
            (string) $request->end,
            (int) $request->type_id
        );
    }
}
