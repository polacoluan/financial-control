<?php

namespace App\Containers\AppSection\Category\Tasks;

use App\Containers\AppSection\Category\Data\Repositories\CategoryRepository;
use App\Containers\AppSection\Category\Events\CategoryCreated;
use App\Containers\AppSection\Category\Models\Category;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task as ParentTask;

class CreateCategoryTask extends ParentTask
{
    public function __construct(
        private readonly CategoryRepository $repository,
    ) {
    }

    /**
     * @throws CreateResourceFailedException
     */
    public function run(array $data): Category
    {
        try {
            $category = $this->repository->create($data);
            CategoryCreated::dispatch($category);

            return $category;
        } catch (\Exception) {
            throw new CreateResourceFailedException();
        }
    }
}
