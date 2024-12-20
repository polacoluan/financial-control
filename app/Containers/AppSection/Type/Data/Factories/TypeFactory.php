<?php

namespace App\Containers\AppSection\Type\Data\Factories;

use App\Containers\AppSection\Type\Models\Type;
use App\Ship\Parents\Factories\Factory as ParentFactory;

/**
 * @template TModel of Type
 *
 * @extends ParentFactory<TModel>
 */
class TypeFactory extends ParentFactory
{
    /** @var class-string<TModel> */
    protected $model = Type::class;

    public function definition(): array
    {
        return [];
    }
}
