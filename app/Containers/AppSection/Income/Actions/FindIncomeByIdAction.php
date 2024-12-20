<?php

namespace App\Containers\AppSection\Income\Actions;

use App\Containers\AppSection\Income\Models\Income;
use App\Containers\AppSection\Income\Tasks\FindIncomeByIdTask;
use App\Containers\AppSection\Income\UI\API\Requests\FindIncomeByIdRequest;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Actions\Action as ParentAction;

class FindIncomeByIdAction extends ParentAction
{
    public function __construct(
        private readonly FindIncomeByIdTask $findIncomeByIdTask,
    ) {
    }

    /**
     * @throws NotFoundException
     */
    public function run(FindIncomeByIdRequest $request): Income
    {
        return $this->findIncomeByIdTask->run($request->id);
    }
}
