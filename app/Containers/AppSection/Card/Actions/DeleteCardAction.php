<?php

namespace App\Containers\AppSection\Card\Actions;

use App\Containers\AppSection\Card\Tasks\DeleteCardTask;
use App\Containers\AppSection\Card\UI\API\Requests\DeleteCardRequest;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Actions\Action as ParentAction;

class DeleteCardAction extends ParentAction
{
    public function __construct(
        private readonly DeleteCardTask $deleteCardTask,
    ) {
    }

    /**
     * @throws DeleteResourceFailedException
     * @throws NotFoundException
     */
    public function run(DeleteCardRequest $request): int
    {
        return $this->deleteCardTask->run($request->id);
    }
}
