<?php

namespace App\Containers\AppSection\Type\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\AppSection\Type\Models\Type;
use App\Containers\AppSection\Type\Tasks\CreateTypeTask;
use App\Containers\AppSection\Type\Tasks\UpdateTypesDefaultFalseTask;
use App\Containers\AppSection\Type\UI\API\Requests\CreateTypeRequest;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;

class CreateTypeAction extends ParentAction
{
    public function __construct(
        private readonly CreateTypeTask $createTypeTask,
        private readonly UpdateTypesDefaultFalseTask $updateTypesDefaultFalseTask,
    ) {
    }

    /**
     * @throws CreateResourceFailedException
     * @throws IncorrectIdException
     */
    public function run(CreateTypeRequest $request): Type
    {
        $data = $request->sanitizeInput([
            'type',
            'description',
            'is_default',
            'installments',
        ]);

        if($data['is_default'] == true){

            $this->updateTypesDefaultFalseTask->run();
        }

        return $this->createTypeTask->run($data);
    }
}
