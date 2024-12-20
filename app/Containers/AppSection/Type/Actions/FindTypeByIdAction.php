<?php

namespace App\Containers\AppSection\Type\Actions;

use App\Containers\AppSection\Type\Models\Type;
use App\Containers\AppSection\Type\Tasks\FindTypeByIdTask;
use App\Containers\AppSection\Type\UI\API\Requests\FindTypeByIdRequest;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Actions\Action as ParentAction;

class FindTypeByIdAction extends ParentAction
{
    public function __construct(
        private readonly FindTypeByIdTask $findTypeByIdTask,
    ) {
    }

    /**
     * @throws NotFoundException
     */
    public function run(FindTypeByIdRequest $request): Type
    {
        return $this->findTypeByIdTask->run($request->id);
    }
}
