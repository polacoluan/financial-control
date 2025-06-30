<?php

namespace App\Containers\AppSection\Transaction\UI\API\Transformers;

use App\Ship\Parents\Transformers\Transformer as ParentTransformer;

class MonthlySummaryTransformer extends ParentTransformer
{
    public function transform(array $data): array
    {
        return [
            'total_expenses' => $data['total_expenses'],
            'total_incomes'  => $data['total_incomes'],
            'total_savings'  => $data['total_savings'],
            'balance'        => $data['balance'],
        ];
    }
}
