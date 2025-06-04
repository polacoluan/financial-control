<?php

namespace App\Containers\AppSection\Category\UI\API\Transformers;

use App\Ship\Parents\Transformers\Transformer as ParentTransformer;

class CategoryExpenseTransformer extends ParentTransformer
{
    protected array $defaultIncludes = [];

    protected array $availableIncludes = [];

    public function transform(object $data): array
    {
        if (isset($data->id)) {
            // This is a category object
            return [
                'id' => $data->id,
                'name' => $data->name,
                'total_expenses' => (float) $data->total_expenses,
                'percentage' => round((float) $data->percentage, 2),
            ];
        }

        // This is the main response object
        return [
            'categories' => array_map(function ($category) {
                return [
                    'id' => $category->id,
                    'name' => $category->name,
                    'total_expenses' => (float) $category->total_expenses,
                    'percentage' => round((float) $category->percentage, 2),
                ];
            }, $data->categories),
            'total_expenses' => (float) $data->total_expenses,
        ];
    }
}
