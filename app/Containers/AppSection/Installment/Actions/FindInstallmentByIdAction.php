<?php

namespace App\Containers\AppSection\Installment\Actions;

use App\Containers\AppSection\Installment\Models\Installment;
use App\Containers\AppSection\Installment\Tasks\FindInstallmentByIdTask;
use App\Containers\AppSection\Installment\UI\API\Requests\FindInstallmentByIdRequest;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Actions\Action as ParentAction;

class FindInstallmentByIdAction extends ParentAction
{
    public function __construct(
        private readonly FindInstallmentByIdTask $findInstallmentByIdTask,
    ) {
    }

    /**
     * @throws NotFoundException
     */
    public function run(FindInstallmentByIdRequest $request): Installment
    {
        return $this->findInstallmentByIdTask->run($request->id);
    }
}
