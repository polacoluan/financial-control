<?php

namespace App\Containers\AppSection\Expense\UI\API\Transformers;

use App\Containers\AppSection\Expense\Models\Expense;
use App\Ship\Parents\Transformers\Transformer as ParentTransformer;

class ExpenseTransformer extends ParentTransformer
{
    protected array $defaultIncludes = [];

    protected array $availableIncludes = [];

    public function transform(Expense $expense): array
    {
        return [
            'object' => $expense->getResourceKey(),
            'id' => $expense->getHashedKey(),
            'created_at' => $expense->created_at,
            'updated_at' => $expense->updated_at,
            'readable_created_at' => $expense->created_at->diffForHumans(),
            'readable_updated_at' => $expense->updated_at->diffForHumans(),
        ];
    }
}
