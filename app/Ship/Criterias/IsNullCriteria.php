<?php

namespace App\Ship\Criterias;

use App\Ship\Parents\Criterias\Criteria as ParentCriteria;
use Prettus\Repository\Contracts\RepositoryInterface as PrettusRepositoryInterface;

class IsNullCriteria extends ParentCriteria
{
    public function __construct(
        private readonly string $field,
    ) {
    }

    public function apply($model, PrettusRepositoryInterface $repository)
    {
        return $model->whereNull($this->field);
    }
}
