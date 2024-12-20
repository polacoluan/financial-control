<?php

namespace App\Containers\AppSection\Expense\Tasks;

use App\Containers\AppSection\Expense\Data\Repositories\ExpenseRepository;
use App\Containers\AppSection\Expense\Events\ExpenseUpdated;
use App\Containers\AppSection\Expense\Models\Expense;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class UpdateExpenseTask extends ParentTask
{
    public function __construct(
        private readonly ExpenseRepository $repository,
    ) {
    }

    /**
     * @throws NotFoundException
     * @throws UpdateResourceFailedException
     */
    public function run(array $data, $id): Expense
    {
        try {
            $expense = $this->repository->update($data, $id);
            ExpenseUpdated::dispatch($expense);

            return $expense;
        } catch (ModelNotFoundException) {
            throw new NotFoundException();
        } catch (\Exception) {
            throw new UpdateResourceFailedException();
        }
    }
}
