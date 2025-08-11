<?php

namespace App\Containers\AppSection\Type\Actions;

use App\Containers\AppSection\Type\Tasks\GetTopTypesExpensesTask;
use App\Containers\AppSection\Type\UI\API\Requests\GetTopTypesExpensesRequest;
use App\Ship\Parents\Actions\Action as ParentAction;

class GetTopTypesExpensesAction extends ParentAction
{
    public function __construct(
        private readonly GetTopTypesExpensesTask $getTopTypesExpensesTask
    ) {}

    public function run(GetTopTypesExpensesRequest $request): array
    {
        return $this->getTopTypesExpensesTask->run(
            (string) $request->start,
            (string) $request->end
        );
    }
}
