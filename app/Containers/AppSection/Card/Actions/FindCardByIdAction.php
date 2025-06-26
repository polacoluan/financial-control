<?php

namespace App\Containers\AppSection\Card\Actions;

use App\Containers\AppSection\Card\Models\Card;
use App\Containers\AppSection\Card\Tasks\FindCardByIdTask;
use App\Containers\AppSection\Card\UI\API\Requests\FindCardByIdRequest;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Actions\Action as ParentAction;

class FindCardByIdAction extends ParentAction
{
    public function __construct(
        private readonly FindCardByIdTask $findCardByIdTask,
    ) {
    }

    /**
     * @throws NotFoundException
     */
    public function run(FindCardByIdRequest $request): Card
    {
        return $this->findCardByIdTask->run($request->id);
    }
}
