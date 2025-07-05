<?php

namespace App\Containers\AppSection\Installment\Data\Repositories;

use App\Containers\AppSection\Installment\Models\Installment;
use App\Ship\Parents\Repositories\Repository as ParentRepository;

/**
 * @template TModel of Installment
 *
 * @extends ParentRepository<TModel>
 */
class InstallmentRepository extends ParentRepository
{
    protected $fieldSearchable = [
        // 'id' => '=',
    ];
}
