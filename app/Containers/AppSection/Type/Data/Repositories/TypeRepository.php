<?php

namespace App\Containers\AppSection\Type\Data\Repositories;

use App\Containers\AppSection\Type\Models\Type;
use App\Ship\Parents\Repositories\Repository as ParentRepository;

/**
 * @template TModel of Type
 *
 * @extends ParentRepository<TModel>
 */
class TypeRepository extends ParentRepository
{
    protected $fieldSearchable = [
        // 'id' => '=',
    ];
}
