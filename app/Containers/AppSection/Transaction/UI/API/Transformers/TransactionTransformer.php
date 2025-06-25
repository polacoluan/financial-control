<?php

namespace App\Containers\AppSection\Transaction\UI\API\Transformers;

use App\Ship\Parents\Transformers\Transformer as ParentTransformer;
use Carbon\Carbon;

class TransactionTransformer extends ParentTransformer
{
    protected array $defaultIncludes = [];

    protected array $availableIncludes = [];

    public function transform(object $transaction): array
    {
        return [
            'name' => $transaction->name,
            'amount' => (float) $transaction->amount,
            'date' => Carbon::parse($transaction->date)->format("d/m/Y"),
            'transaction_type' => $transaction->transaction_type,
        ];
    }
}
