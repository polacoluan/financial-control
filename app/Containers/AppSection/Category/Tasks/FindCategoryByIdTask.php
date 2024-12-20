<?php

namespace App\Containers\AppSection\Category\Tasks;

use App\Containers\AppSection\Category\Data\Repositories\CategoryRepository;
use App\Containers\AppSection\Category\Events\CategoryRequested;
use App\Containers\AppSection\Category\Models\Category;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task as ParentTask;

class FindCategoryByIdTask extends ParentTask
{
    public function __construct(
        private readonly CategoryRepository $repository,
    ) {
    }

    /**
     * @throws NotFoundException
     */
    public function run($id): Category
    {
        try {
            $category = $this->repository->find($id);
            CategoryRequested::dispatch($category);

            return $category;
        } catch (\Exception) {
            throw new NotFoundException();
        }
    }
}
