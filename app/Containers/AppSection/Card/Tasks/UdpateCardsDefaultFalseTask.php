<?php

namespace App\Containers\AppSection\Card\Tasks;

use App\Containers\AppSection\Card\Data\Repositories\CardRepository;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class UdpateCardsDefaultFalseTask extends ParentTask
{
    public function __construct(
        private readonly CardRepository $repository,
    ) {
    }

    /**
     * @throws NotFoundException
     * @throws UpdateResourceFailedException
     */
    public function run(): mixed
    {
        try {
            return $this->repository->where('is_default', true)->update(['is_default' => false]);
        } catch (ModelNotFoundException) {
            throw new NotFoundException();
        } catch (\Exception $e) {
            throw new UpdateResourceFailedException();
        }
    }
}
