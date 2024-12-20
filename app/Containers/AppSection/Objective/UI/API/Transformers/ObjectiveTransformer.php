<?php

namespace App\Containers\AppSection\Objective\UI\API\Transformers;

use App\Containers\AppSection\Objective\Models\Objective;
use App\Ship\Parents\Transformers\Transformer as ParentTransformer;

class ObjectiveTransformer extends ParentTransformer
{
    protected array $defaultIncludes = [];

    protected array $availableIncludes = [];

    public function transform(Objective $objective): array
    {
        return [
            'object' => $objective->getResourceKey(),
            'id' => $objective->getHashedKey(),
            'created_at' => $objective->created_at,
            'updated_at' => $objective->updated_at,
            'readable_created_at' => $objective->created_at->diffForHumans(),
            'readable_updated_at' => $objective->updated_at->diffForHumans(),
        ];
    }
}
