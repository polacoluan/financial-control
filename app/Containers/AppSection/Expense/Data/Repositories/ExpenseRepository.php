<?php

namespace App\Containers\AppSection\Expense\Data\Repositories;

use App\Containers\AppSection\Expense\Models\Expense;
use App\Ship\Parents\Repositories\Repository as ParentRepository;

/**
 * @template TModel of Expense
 *
 * @extends ParentRepository<TModel>
 */
class ExpenseRepository extends ParentRepository
{
    protected $fieldSearchable = [
        // 'id' => '=',
    ];
}
