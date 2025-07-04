<?php

namespace App\Containers\AppSection\Expense\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\AppSection\Expense\Models\Expense;
use App\Containers\AppSection\Expense\Tasks\CreateExpenseTask;
use App\Containers\AppSection\Expense\UI\API\Requests\CreateExpenseRequest;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;
use Carbon\Carbon;

class CreateExpenseAction extends ParentAction
{
    public function __construct(
        private readonly CreateExpenseTask $createExpenseTask,
    ) {
    }

    /**
     * @throws CreateResourceFailedException
     * @throws IncorrectIdException
     */
    public function run(CreateExpenseRequest $request): Expense
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

        if ($data['installments'] > 1) {

            $data['amount'] = $data['amount'] / $data['installments'];
            
            for ($i = 0; $i < $data['installments']; $i++) {
                $data['date'] = Carbon::parse($data['date'])->addMonths($i);

                $expenses[] = $this->createExpenseTask->run($data);
            }

            return $expenses[0];
        }

        return $this->createExpenseTask->run($data);
    }
}
