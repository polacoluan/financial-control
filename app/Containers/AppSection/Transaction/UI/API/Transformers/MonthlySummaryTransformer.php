<?php

namespace App\Containers\AppSection\Transaction\UI\API\Transformers;

use App\Ship\Parents\Transformers\Transformer as ParentTransformer;

class MonthlySummaryTransformer extends ParentTransformer
{
    public function transform(array $data): array
    {
        return [
            'total_expenses' => number_format($data['total_expenses'], 2, ',', '.'),
            'total_incomes'  => number_format($data['total_incomes'], 2, ',', '.'),
            'total_savings'  => number_format($data['total_savings'], 2, ',', '.'),
            'balance'        => number_format($data['balance'], 2, ',', '.'),
        ];
    }
}
