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
            'id' => $objective->getHashedKey(),
            'objective' => $objective->objective,
            'description' => $objective->description,
            'target_value' => number_format($objective->target_value, 2, ",", "."),
            'saved_amount' => number_format($objective->saved_amount, 2, ",", "."),
            'progress' => (
                (($objective->saved_amount ?? 0) / max($objective->target_value ?? 0, 1))
            ) * 100,
            'updated_at' => $objective->updated_at,
            'readable_created_at' => $objective->created_at->diffForHumans(),
            'readable_updated_at' => $objective->updated_at->diffForHumans(),
        ];
    }
}
