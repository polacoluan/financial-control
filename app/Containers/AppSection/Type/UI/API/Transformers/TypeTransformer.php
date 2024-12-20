<?php

namespace App\Containers\AppSection\Type\UI\API\Transformers;

use App\Containers\AppSection\Type\Models\Type;
use App\Ship\Parents\Transformers\Transformer as ParentTransformer;

class TypeTransformer extends ParentTransformer
{
    protected array $defaultIncludes = [];

    protected array $availableIncludes = [];

    public function transform(Type $type): array
    {
        return [
            'object' => $type->getResourceKey(),
            'id' => $type->getHashedKey(),
            'type' => $type->type,
            'description' => $type->description,
            'created_at' => $type->created_at,
            'updated_at' => $type->updated_at,
            'readable_created_at' => $type->created_at->diffForHumans(),
            'readable_updated_at' => $type->updated_at->diffForHumans(),
        ];
    }
}
