<?php

namespace App\Containers\AppSection\Expense\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\AppSection\Expense\Models\Expense;
use App\Containers\AppSection\Expense\Tasks\UpdateExpenseTask;
use App\Containers\AppSection\Expense\UI\API\Requests\UpdateExpenseRequest;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;

class UpdateExpenseAction extends ParentAction
{
    public function __construct(
        private readonly UpdateExpenseTask $updateExpenseTask,
    ) {
    }

    /**
     * @throws UpdateResourceFailedException
     * @throws IncorrectIdException
     * @throws NotFoundException
     */
    public function run(UpdateExpenseRequest $request): Expense
    {
        $data = $request->sanitizeInput([
            'expense', 
            'description', 
            'amount', 
            'date', 
            'installments', 
            'category_id', 
            'type_id', 
            'card_id'
        ]);

        return $this->updateExpenseTask->run($data, $request->id);
    }
}
