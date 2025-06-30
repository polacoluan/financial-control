<?php

namespace App\Containers\AppSection\Transaction\Actions;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\AppSection\Transaction\UI\API\Requests\GetMonthlySummaryRequest;
use App\Containers\AppSection\Expense\Tasks\ListExpensesByMonthTask;
use App\Containers\AppSection\Income\Tasks\ListIncomesByMonthTask;
use App\Containers\AppSection\Objective\Tasks\GetTotalSavedAmountTask;
use App\Ship\Parents\Actions\Action as ParentAction;
use Prettus\Repository\Exceptions\RepositoryException;

class GetMonthlySummaryAction extends ParentAction
{
    public function __construct(
        private readonly ListExpensesByMonthTask $listExpensesByMonthTask,
        private readonly ListIncomesByMonthTask $listIncomesByMonthTask,
        private readonly GetTotalSavedAmountTask $getTotalSavedAmountTask,
    ) {}

    /**
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function run(GetMonthlySummaryRequest $request): array
    {
        $expenses = $this->listExpensesByMonthTask->run($request->year, $request->month);
        $incomes = $this->listIncomesByMonthTask->run($request->month);

        $totalExpenses = 0;
        foreach ($expenses as $expense) {
            $monthlyAmount = $expense->installments > 1 ? $expense->amount / $expense->installments : $expense->amount;
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
