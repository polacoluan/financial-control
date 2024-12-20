<?php

namespace App\Containers\AppSection\Income\UI\API\Transformers;

use App\Containers\AppSection\Income\Models\Income;
use App\Ship\Parents\Transformers\Transformer as ParentTransformer;

class IncomeTransformer extends ParentTransformer
{
    protected array $defaultIncludes = [];

    protected array $availableIncludes = [];

    public function transform(Income $income): array
    {
        return [
            'object' => $income->getResourceKey(),
            'id' => $income->getHashedKey(),
            'created_at' => $income->created_at,
            'updated_at' => $income->updated_at,
            'readable_created_at' => $income->created_at->diffForHumans(),
            'readable_updated_at' => $income->updated_at->diffForHumans(),
        ];
    }
}
