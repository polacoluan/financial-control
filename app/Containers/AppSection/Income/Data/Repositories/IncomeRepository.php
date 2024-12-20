<?php

namespace App\Containers\AppSection\Income\Data\Repositories;

use App\Containers\AppSection\Income\Models\Income;
use App\Ship\Parents\Repositories\Repository as ParentRepository;

/**
 * @template TModel of Income
 *
 * @extends ParentRepository<TModel>
 */
class IncomeRepository extends ParentRepository
{
    protected $fieldSearchable = [
        // 'id' => '=',
    ];
}
