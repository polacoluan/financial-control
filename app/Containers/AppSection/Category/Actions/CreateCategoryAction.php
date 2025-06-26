<?php

namespace App\Containers\AppSection\Category\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\AppSection\Category\Models\Category;
use App\Containers\AppSection\Category\Tasks\CreateCategoryTask;
use App\Containers\AppSection\Category\UI\API\Requests\CreateCategoryRequest;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;

class CreateCategoryAction extends ParentAction
{
    public function __construct(
        private readonly CreateCategoryTask $createCategoryTask,
    ) {
    }

    /**
     * @throws CreateResourceFailedException
     * @throws IncorrectIdException
     */
    public function run(CreateCategoryRequest $request): Category
    {
        $data = $request->sanitizeInput([
            "category",
            "description"
        ]);

        return $this->createCategoryTask->run($data);
    }
}
