<?php

namespace App\Containers\AppSection\Objective\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\AppSection\Objective\Models\Objective;
use App\Containers\AppSection\Objective\Tasks\CreateObjectiveTask;
use App\Containers\AppSection\Objective\UI\API\Requests\CreateObjectiveRequest;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;

class CreateObjectiveAction extends ParentAction
{
    public function __construct(
        private readonly CreateObjectiveTask $createObjectiveTask,
    ) {
    }

    /**
     * @throws CreateResourceFailedException
     * @throws IncorrectIdException
     */
    public function run(CreateObjectiveRequest $request): Objective
    {
        $data = $request->sanitizeInput([
            // add your request data here
        ]);

        return $this->createObjectiveTask->run($data);
    }
}
