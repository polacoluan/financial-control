<?php

namespace App\Containers\AppSection\Category\Data\Factories;

use App\Containers\AppSection\Category\Models\Category;
use App\Ship\Parents\Factories\Factory as ParentFactory;

/**
 * @template TModel of Category
 *
 * @extends ParentFactory<TModel>
 */
class CategoryFactory extends ParentFactory
{
    /** @var class-string<TModel> */
    protected $model = Category::class;

    public function definition(): array
    {
        return [];
    }
}
