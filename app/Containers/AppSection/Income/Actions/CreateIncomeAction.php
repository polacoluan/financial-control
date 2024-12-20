<?php

namespace App\Containers\AppSection\Income\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\AppSection\Income\Models\Income;
use App\Containers\AppSection\Income\Tasks\CreateIncomeTask;
use App\Containers\AppSection\Income\UI\API\Requests\CreateIncomeRequest;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;

class CreateIncomeAction extends ParentAction
{
    public function __construct(
        private readonly CreateIncomeTask $createIncomeTask,
    ) {
    }

    /**
     * @throws CreateResourceFailedException
     * @throws IncorrectIdException
     */
    public function run(CreateIncomeRequest $request): Income
    {
        $data = $request->sanitizeInput([
            // add your request data here
        ]);

        return $this->createIncomeTask->run($data);
    }
}
