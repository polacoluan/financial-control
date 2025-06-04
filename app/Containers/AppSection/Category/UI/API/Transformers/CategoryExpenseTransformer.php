<?php

namespace App\Containers\AppSection\Category\UI\API\Transformers;

use App\Ship\Parents\Transformers\Transformer as ParentTransformer;

class CategoryExpenseTransformer extends ParentTransformer
{
    protected array $defaultIncludes = [];

    protected array $availableIncludes = [];

    public function transform(object $category): array
    {
        return [
            'id' => $category->id,
            'name' => $category->name,
            'total_expenses' => (float) $category->total_expenses,
            'percentage' => (int) $category->percentage,
        ];
    }
}
