<?php

namespace App\Containers\AppSection\Income\Data\Factories;

use App\Containers\AppSection\Income\Models\Income;
use App\Ship\Parents\Factories\Factory as ParentFactory;

/**
 * @template TModel of Income
 *
 * @extends ParentFactory<TModel>
 */
class IncomeFactory extends ParentFactory
{
    /** @var class-string<TModel> */
    protected $model = Income::class;

    public function definition(): array
    {
        return [];
    }
}
