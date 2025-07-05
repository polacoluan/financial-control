<?php

namespace App\Containers\AppSection\Installment\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\AppSection\Installment\Models\Installment;
use App\Containers\AppSection\Installment\Tasks\CreateInstallmentTask;
use App\Containers\AppSection\Installment\UI\API\Requests\CreateInstallmentRequest;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;

class CreateInstallmentAction extends ParentAction
{
    public function __construct(
        private readonly CreateInstallmentTask $createInstallmentTask,
    ) {
    }

    /**
     * @throws CreateResourceFailedException
     * @throws IncorrectIdException
     */
    public function run(CreateInstallmentRequest $request): Installment
    {
        $data = $request->sanitizeInput([
            // add your request data here
        ]);

        return $this->createInstallmentTask->run($data);
    }
}
