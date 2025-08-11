<?php

namespace App\Containers\AppSection\Type\UI\API\Transformers;

use App\Ship\Parents\Transformers\Transformer as ParentTransformer;

class TypeExpenseTransformer extends ParentTransformer
{
    protected array $defaultIncludes = [];

    protected array $availableIncludes = [];

    public function transform(object $type): array
    {
        return [
            'id' => $type->id,
            'description' => $type->description,
            'total_expenses' => number_format($type->total_expenses, 2, ",", "."),
            'percentage' => (int) $type->percentage,
        ];
    }
}
