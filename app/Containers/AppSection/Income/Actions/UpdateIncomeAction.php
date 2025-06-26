<?php

namespace App\Containers\AppSection\Income\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\AppSection\Income\Models\Income;
use App\Containers\AppSection\Income\Tasks\UpdateIncomeTask;
use App\Containers\AppSection\Income\UI\API\Requests\UpdateIncomeRequest;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;

class UpdateIncomeAction extends ParentAction
{
    public function __construct(
        private readonly UpdateIncomeTask $updateIncomeTask,
    ) {
    }

    /**
     * @throws UpdateResourceFailedException
     * @throws IncorrectIdException
     * @throws NotFoundException
     */
    public function run(UpdateIncomeRequest $request): Income
    {
        $data = $request->sanitizeInput([
            'income',
            'description',
            'amount',
            'date',
        ]);

        return $this->updateIncomeTask->run($data, $request->id);
    }
}
