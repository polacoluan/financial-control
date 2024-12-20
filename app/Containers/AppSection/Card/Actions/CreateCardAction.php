<?php

namespace App\Containers\AppSection\Card\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\AppSection\Card\Models\Card;
use App\Containers\AppSection\Card\Tasks\CreateCardTask;
use App\Containers\AppSection\Card\UI\API\Requests\CreateCardRequest;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;

class CreateCardAction extends ParentAction
{
    public function __construct(
        private readonly CreateCardTask $createCardTask,
    ) {
    }

    /**
     * @throws CreateResourceFailedException
     * @throws IncorrectIdException
     */
    public function run(CreateCardRequest $request): Card
    {
        $data = $request->sanitizeInput([
            'card',
            'description'
        ]);

        return $this->createCardTask->run($data);
    }
}
