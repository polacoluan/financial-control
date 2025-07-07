<?php

namespace App\Containers\AppSection\Expense\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\AppSection\Expense\Models\Expense;
use App\Containers\AppSection\Expense\Tasks\CreateExpenseTask;
use App\Containers\AppSection\Expense\UI\API\Requests\CreateExpenseRequest;
use App\Containers\AppSection\Installment\Tasks\CreateInstallmentTask;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;
use Carbon\Carbon;

class CreateExpenseAction extends ParentAction
{
    public function __construct(
        private readonly CreateExpenseTask $createExpenseTask,
        private readonly CreateInstallmentTask $createInstallmentTask
    ) {}
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

            $installment = $this->createInstallmentTask->run(['installment' => $data['expense'], 'installments_quantity' => $data['installments']]);

            $data['installment_id'] = $installment->installment_id;
            $installments = $data['installments'];
            $date = $data['date'];

            for ($i = 0; $i < $installments; $i++) {
                $data['date'] = Carbon::parse($date)->addMonths($i);
                $data['installments'] = $i + 1;
                $expenses[] = $this->createExpenseTask->run($data);
            }

            return $expenses[0];
        }

        return $this->createExpenseTask->run($data);
    }
}
