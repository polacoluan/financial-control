<?php

namespace App\Containers\AppSection\Objective\Actions;

use App\Containers\AppSection\Objective\Models\Objective;
use App\Containers\AppSection\Objective\Tasks\FindObjectiveByIdTask;
use App\Containers\AppSection\Objective\UI\API\Requests\FindObjectiveByIdRequest;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Actions\Action as ParentAction;

class FindObjectiveByIdAction extends ParentAction
{
    public function __construct(
        private readonly FindObjectiveByIdTask $findObjectiveByIdTask,
    ) {
    }

    /**
     * @throws NotFoundException
     */
    public function run(FindObjectiveByIdRequest $request): Objective
    {
        return $this->findObjectiveByIdTask->run($request->id);
    }
}
