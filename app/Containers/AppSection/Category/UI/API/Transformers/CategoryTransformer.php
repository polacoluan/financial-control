<?php

namespace App\Containers\AppSection\Category\UI\API\Transformers;

use App\Containers\AppSection\Category\Models\Category;
use App\Ship\Parents\Transformers\Transformer as ParentTransformer;

class CategoryTransformer extends ParentTransformer
{
    protected array $defaultIncludes = [];

    protected array $availableIncludes = [];

    public function transform(Category $category): array
    {
        return [
            'object' => $category->getResourceKey(),
            'id' => $category->getHashedKey(),
            'category' => $category->category,
            'description' => $category->description,
            'created_at' => $category->created_at,
            'updated_at' => $category->updated_at,
            'readable_created_at' => $category->created_at->diffForHumans(),
            'readable_updated_at' => $category->updated_at->diffForHumans(),
        ];
    }
}
