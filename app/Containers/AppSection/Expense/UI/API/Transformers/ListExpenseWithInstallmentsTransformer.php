<?php

namespace App\Containers\AppSection\Expense\UI\API\Transformers;

use App\Containers\AppSection\Expense\Models\Expense;
use App\Ship\Parents\Transformers\Transformer as ParentTransformer;
use Carbon\Carbon;

class ListExpenseWithInstallmentsTransformer extends ParentTransformer
{
    public function transform(Expense $expense): array
    {
        return [
            'expense' => $expense->expense,
            'installments' => $expense->installments,
            'installments_quantity' => $expense->installments_quantity,
            'amount' => number_format($expense->amount, 2, ',', '.'),
            'category' => $expense->category->category,
            'type' => $expense->type->type,
            'card' => optional($expense->card)->card,
            'date' => Carbon::parse($expense->date)->format('d/m/Y'),
            'total' =>  number_format($expense->amount * $expense->installments_quantity, 2, ',', '.'),
            'paid' =>  number_format($expense->amount * $expense->installments, 2, ',', '.'),
            'to_pay' => number_format(($expense->amount * $expense->installments_quantity) - ($expense->amount * $expense->installments), 2, ',', '.')
        ];
    }
}
