<?php

namespace App\Containers\AppSection\Type\Tasks;

use App\Containers\AppSection\Type\Data\Repositories\TypeRepository;
use App\Containers\AppSection\Type\Events\TypeRequested;
use App\Containers\AppSection\Type\Models\Type;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task as ParentTask;

class FindTypeByIdTask extends ParentTask
{
    public function __construct(
        private readonly TypeRepository $repository,
    ) {
    }

    /**
     * @throws NotFoundException
     */
    public function run($id): Type
    {
        try {
            $type = $this->repository->find($id);
            TypeRequested::dispatch($type);

            return $type;
        } catch (\Exception) {
            throw new NotFoundException();
        }
    }
}
