<?php

namespace App\Containers\AppSection\Transaction\UI\API\Transformers;

use App\Containers\AppSection\Transaction\Models\;
use App\Ship\Parents\Transformers\Transformer as ParentTransformer;

class TransactionTransformer extends ParentTransformer
{
    protected array $defaultIncludes = [];

    protected array $availableIncludes = [];

    public function transform( $): array
    {
        return [
            'object' => $->getResourceKey(),
            'id' => $->getHashedKey(),
            'created_at' => $->created_at,
            'updated_at' => $->updated_at,
            'readable_created_at' => $->created_at->diffForHumans(),
            'readable_updated_at' => $->updated_at->diffForHumans(),
        ];
    }
}
