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
            'description' => $category->description,
            'total_expenses' => number_format($category->total_expenses, 2, ",", "."),
            'percentage' => (int) $category->percentage,
        ];
    }
}
