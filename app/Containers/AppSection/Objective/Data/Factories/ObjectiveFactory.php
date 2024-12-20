<?php

namespace App\Containers\AppSection\Objective\Data\Factories;

use App\Containers\AppSection\Objective\Models\Objective;
use App\Ship\Parents\Factories\Factory as ParentFactory;

/**
 * @template TModel of Objective
 *
 * @extends ParentFactory<TModel>
 */
class ObjectiveFactory extends ParentFactory
{
    /** @var class-string<TModel> */
    protected $model = Objective::class;

    public function definition(): array
    {
        return [];
    }
}
