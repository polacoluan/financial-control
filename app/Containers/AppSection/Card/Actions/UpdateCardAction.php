<?php

namespace App\Containers\AppSection\Card\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\AppSection\Card\Models\Card;
use App\Containers\AppSection\Card\Tasks\UpdateCardTask;
use App\Containers\AppSection\Card\UI\API\Requests\UpdateCardRequest;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;

class UpdateCardAction extends ParentAction
{
    public function __construct(
        private readonly UpdateCardTask $updateCardTask,
    ) {
    }

    /**
     * @throws UpdateResourceFailedException
     * @throws IncorrectIdException
     * @throws NotFoundException
     */
    public function run(UpdateCardRequest $request): Card
    {
        $data = $request->sanitizeInput([
            // add your request data here
        ]);

        return $this->updateCardTask->run($data, $request->id);
    }
}
