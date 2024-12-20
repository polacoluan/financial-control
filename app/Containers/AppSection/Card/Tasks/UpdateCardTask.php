<?php

namespace App\Containers\AppSection\Card\Tasks;

use App\Containers\AppSection\Card\Data\Repositories\CardRepository;
use App\Containers\AppSection\Card\Events\CardUpdated;
use App\Containers\AppSection\Card\Models\Card;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class UpdateCardTask extends ParentTask
{
    public function __construct(
        private readonly CardRepository $repository,
    ) {
    }

    /**
     * @throws NotFoundException
     * @throws UpdateResourceFailedException
     */
    public function run(array $data, $id): Card
    {
        try {
            $card = $this->repository->update($data, $id);
            CardUpdated::dispatch($card);

            return $card;
        } catch (ModelNotFoundException) {
            throw new NotFoundException();
        } catch (\Exception) {
            throw new UpdateResourceFailedException();
        }
    }
}
