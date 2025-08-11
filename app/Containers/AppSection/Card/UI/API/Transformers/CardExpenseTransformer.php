<?php

namespace App\Containers\AppSection\Card\UI\API\Transformers;

use App\Ship\Parents\Transformers\Transformer as ParentTransformer;

class CardExpenseTransformer extends ParentTransformer
{
    protected array $defaultIncludes = [];

    protected array $availableIncludes = [];

    public function transform(object $card): array
    {
        return [
            'id' => $card->id,
            'description' => $card->description,
            'total_expenses' => number_format($card->total_expenses, 2, ",", "."),
            'percentage' => (int) $card->percentage,
        ];
    }
}
