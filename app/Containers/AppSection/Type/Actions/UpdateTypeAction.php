<?php

namespace App\Containers\AppSection\Type\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\AppSection\Type\Models\Type;
use App\Containers\AppSection\Type\Tasks\UpdateTypeTask;
use App\Containers\AppSection\Type\Tasks\UpdateTypesDefaultFalseTask;
use App\Containers\AppSection\Type\UI\API\Requests\UpdateTypeRequest;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;

class UpdateTypeAction extends ParentAction
{
    public function __construct(
        private readonly UpdateTypeTask $updateTypeTask,
        private readonly UpdateTypesDefaultFalseTask $updateTypesDefaultFalseTask,
    ) {
    }

    /**
     * @throws UpdateResourceFailedException
     * @throws IncorrectIdException
     * @throws NotFoundException
     */
    public function run(UpdateTypeRequest $request): Type
    {
        $data = $request->sanitizeInput([
            "type",
            "description",
            "is_default",
            "installments",
        ]);

        if($data['is_default'] == true){

            $this->updateTypesDefaultFalseTask->run();
        }

        return $this->updateTypeTask->run($data, $request->id);
    }
}
