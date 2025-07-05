<?php

namespace App\Containers\AppSection\Installment\Actions;

use App\Containers\AppSection\Installment\Tasks\DeleteInstallmentTask;
use App\Containers\AppSection\Installment\UI\API\Requests\DeleteInstallmentRequest;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Actions\Action as ParentAction;

class DeleteInstallmentAction extends ParentAction
{
    public function __construct(
        private readonly DeleteInstallmentTask $deleteInstallmentTask,
    ) {
    }

    /**
     * @throws DeleteResourceFailedException
     * @throws NotFoundException
     */
    public function run(DeleteInstallmentRequest $request): int
    {
        return $this->deleteInstallmentTask->run($request->id);
    }
}
