<?php

namespace App\Containers\AppSection\Type\Tasks;

use App\Containers\AppSection\Type\Data\Repositories\TypeRepository;
use App\Containers\AppSection\Type\Events\TypeCreated;
use App\Containers\AppSection\Type\Models\Type;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task as ParentTask;

class CreateTypeTask extends ParentTask
{
    public function __construct(
        private readonly TypeRepository $repository,
    ) {
    }

    /**
     * @throws CreateResourceFailedException
     */
    public function run(array $data): Type
    {
        try {
            $type = $this->repository->create($data);
            TypeCreated::dispatch($type);

            return $type;
        } catch (\Exception) {
            throw new CreateResourceFailedException();
        }
    }
}
