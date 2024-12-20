<?php

namespace App\Containers\AppSection\Expense\Data\Factories;

use App\Containers\AppSection\Expense\Models\Expense;
use App\Ship\Parents\Factories\Factory as ParentFactory;

/**
 * @template TModel of Expense
 *
 * @extends ParentFactory<TModel>
 */
class ExpenseFactory extends ParentFactory
{
    /** @var class-string<TModel> */
    protected $model = Expense::class;

    public function definition(): array
    {
        return [];
    }
}
