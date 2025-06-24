<?php

namespace App\Containers\AppSection\Transaction\UI\API\Transformers;

use App\Ship\Parents\Transformers\Transformer as ParentTransformer;

class TransactionTransformer extends ParentTransformer
{
    protected array $defaultIncludes = [];

    protected array $availableIncludes = [];

    public function transform(array $transaction): array
    {
        return [
            'name' => $transaction['name'],
            'amount' => (float) $transaction['amount'],
            'date' => $transaction['date'],
            'transaction_type' => $transaction['transaction_type'],
        ];
    }
}
