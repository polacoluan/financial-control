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
            'expense' => $expense->expense,
            'description' => $expense->description,
            'amount' => $expense->amount,
            'date' => $expense->date,
            'category_id' => $expense->category->getHashedKey(),
            'category' => $expense->category->category,
            'type_id' => $expense->type->getHashedKey(),
            'type' => $expense->type->type,
            'card_id' => $expense->card !== null ? $expense->card->getHashedKey() : null,
            'card' => $expense->card->card ?? null,
            'installments' => $expense->installments,
            'created_at' => $expense->created_at,
            'updated_at' => $expense->updated_at,
            'readable_created_at' => $expense->created_at->diffForHumans(),
            'readable_updated_at' => $expense->updated_at->diffForHumans(),
        ];
    }
}
