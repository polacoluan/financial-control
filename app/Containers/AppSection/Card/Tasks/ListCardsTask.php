<?php

namespace App\Containers\AppSection\Card\Tasks;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\AppSection\Card\Data\Repositories\CardRepository;
use App\Containers\AppSection\Card\Events\CardsListed;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Prettus\Repository\Exceptions\RepositoryException;

class ListCardsTask extends ParentTask
{
    public function __construct(
        private readonly CardRepository $repository,
    ) {
    }

    /**
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function run(): mixed
    {
        $result = $this->repository->addRequestCriteria()->paginate();
        CardsListed::dispatch($result);

        return $result;
    }
}
