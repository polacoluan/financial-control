<?php

namespace App\Containers\AppSection\Installment\UI\API\Transformers;

use App\Containers\AppSection\Installment\Models\Installment;
use App\Ship\Parents\Transformers\Transformer as ParentTransformer;

class InstallmentTransformer extends ParentTransformer
{
    protected array $defaultIncludes = [];

    protected array $availableIncludes = [];

    public function transform(Installment $installment): array
    {
        return [
            'object' => $installment->getResourceKey(),
            'id' => $installment->getHashedKey(),
            'created_at' => $installment->created_at,
            'updated_at' => $installment->updated_at,
            'readable_created_at' => $installment->created_at->diffForHumans(),
            'readable_updated_at' => $installment->updated_at->diffForHumans(),
        ];
    }
}
