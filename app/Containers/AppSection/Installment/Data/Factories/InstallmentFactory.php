<?php

namespace App\Containers\AppSection\Installment\Data\Factories;

use App\Containers\AppSection\Installment\Models\Installment;
use App\Ship\Parents\Factories\Factory as ParentFactory;

/**
 * @template TModel of Installment
 *
 * @extends ParentFactory<TModel>
 */
class InstallmentFactory extends ParentFactory
{
    /** @var class-string<TModel> */
    protected $model = Installment::class;

    public function definition(): array
    {
        return [];
    }
}
