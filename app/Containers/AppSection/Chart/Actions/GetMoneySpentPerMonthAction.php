<?php

namespace App\Containers\AppSection\Chart\Actions;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\AppSection\Chart\UI\API\Requests\GetMoneySpentPerMonthRequest;
use App\Containers\AppSection\Expense\Tasks\ListExpensesByMonthTask;
use App\Ship\Parents\Actions\Action as ParentAction;
use Prettus\Repository\Exceptions\RepositoryException;

class GetMoneySpentPerMonthAction extends ParentAction
{
    public function __construct(
        private readonly ListExpensesByMonthTask $listExpensesByMonthTask,
    ) {
    }

    /**
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function run(GetMoneySpentPerMonthRequest $request): mixed
    {
        $expenses = $this->listExpensesByMonthTask->run(1);

        $totalAmount = 0;
        $categories = [];
        $types = [];
        $cards = [];
        $dates = [];

        foreach ($expenses as $expense) {
            $monthlyAmount = $expense->installments > 1 ? $expense->amount / $expense->installments : $expense->amount;

            $totalAmount += $monthlyAmount;

            if (!isset($categories[$expense->category->category])) {
                $categories[$expense->category->category] = 0;
            }
            $categories[$expense->category->category] += $monthlyAmount;

            if (!isset($types[$expense->type->type])) {
                $types[$expense->type->type] = 0;
            }
            $types[$expense->type->type] += $monthlyAmount;

            if (!isset($cards[$expense->card->card])) {
                $cards[$expense->card->card] = 0;
            }
            $cards[$expense->card->card] += $monthlyAmount;

            if (!isset($dates[$expense->date])) {
                $dates[$expense->date] = 0;
            }
            $dates[$expense->date] += $monthlyAmount;
        }

        return [
            'totalAmount' => round($totalAmount, 2),
            'categories' => array_map(fn($value) => round($value, 2), $categories),
            'types' => array_map(fn($value) => round($value, 2), $types),
            'cards' => array_map(fn($value) => round($value, 2), $cards),
            'dates' => array_map(fn($value) => round($value, 2), $dates),
        ];
    }
}
