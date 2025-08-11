<?php

namespace App\Containers\AppSection\Transaction\Actions;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\AppSection\Transaction\UI\API\Requests\GetMonthlySummaryRequest;
use App\Containers\AppSection\Expense\Tasks\ListExpensesByRangeDateTask;
use App\Containers\AppSection\Income\Tasks\ListIncomesByRangeDateTask;
use App\Containers\AppSection\Objective\Tasks\GetTotalSavedAmountTask;
use App\Ship\Parents\Actions\Action as ParentAction;
use Prettus\Repository\Exceptions\RepositoryException;

class GetMonthlySummaryAction extends ParentAction
{
    public function __construct(
        private readonly ListExpensesByRangeDateTask $ListExpensesByRangeDateTask,
        private readonly ListIncomesByRangeDateTask $ListIncomesByRangeDateTask,
        private readonly GetTotalSavedAmountTask $getTotalSavedAmountTask,
    ) {}

    /**
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function run(GetMonthlySummaryRequest $request): array
    {
        $expenses = $this->ListExpensesByRangeDateTask->run($request->start, $request->end);
        $incomes = $this->ListIncomesByRangeDateTask->run($request->start, $request->end);

        $totalExpenses = 0;
        foreach ($expenses as $expense) {
            $monthlyAmount = $expense->amount;
            $totalExpenses += $monthlyAmount;
        }

        $totalIncomes = 0;
        foreach ($incomes as $income) {
            $totalIncomes += $income->amount;
        }

        $savedAmount = $this->getTotalSavedAmountTask->run();

        return [
            'total_expenses' => round($totalExpenses, 2),
            'total_incomes' => round($totalIncomes, 2),
            'total_savings' => round($savedAmount, 2),
            'balance' => round($totalIncomes - $totalExpenses, 2),
        ];
    }
}
