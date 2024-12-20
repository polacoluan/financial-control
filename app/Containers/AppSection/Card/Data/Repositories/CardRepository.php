<?php

namespace App\Containers\AppSection\Card\Data\Repositories;

use App\Containers\AppSection\Card\Models\Card;
use App\Ship\Parents\Repositories\Repository as ParentRepository;

/**
 * @template TModel of Card
 *
 * @extends ParentRepository<TModel>
 */
class CardRepository extends ParentRepository
{
    protected $fieldSearchable = [
        // 'id' => '=',
    ];
}
