<?php

namespace App\Containers\AppSection\Objective\Data\Repositories;

use App\Containers\AppSection\Objective\Models\Objective;
use App\Ship\Parents\Repositories\Repository as ParentRepository;

/**
 * @template TModel of Objective
 *
 * @extends ParentRepository<TModel>
 */
class ObjectiveRepository extends ParentRepository
{
    protected $fieldSearchable = [
        // 'id' => '=',
    ];
}
