<?php

namespace App\Containers\AppSection\Objective\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\AppSection\Objective\Models\Objective;
use App\Containers\AppSection\Objective\Tasks\UpdateObjectiveTask;
use App\Containers\AppSection\Objective\UI\API\Requests\UpdateObjectiveRequest;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;

class UpdateObjectiveAction extends ParentAction
{
    public function __construct(
        private readonly UpdateObjectiveTask $updateObjectiveTask,
    ) {}

    /**
     * @throws UpdateResourceFailedException
     * @throws IncorrectIdException
     * @throws NotFoundException
     */
    public function run(UpdateObjectiveRequest $request): Objective
    {
        $data = $request->sanitizeInput([
            'objective',
            'description',
            'target_value',
            'saved_amount',
        ]);

        return $this->updateObjectiveTask->run($data, $request->id);
    }
}
