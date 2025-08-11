<?php

namespace App\Containers\AppSection\Card\Actions;

use App\Containers\AppSection\Card\Tasks\GetTopCardExpensesTask;
use App\Containers\AppSection\Card\UI\API\Requests\GetTopCardExpensesRequest;
use App\Ship\Parents\Actions\Action as ParentAction;

class GetTopCardExpensesAction extends ParentAction
{
    public function __construct(
        private readonly GetTopCardExpensesTask $getTopCardExpensesTask
    ) {}

    public function run(GetTopCardExpensesRequest $request): array
    {
        return $this->getTopCardExpensesTask->run(
            (string) $request->start,
            (string) $request->end
        );
    }
}
