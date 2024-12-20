<?php

namespace App\Containers\AppSection\Card\Data\Factories;

use App\Containers\AppSection\Card\Models\Card;
use App\Ship\Parents\Factories\Factory as ParentFactory;

/**
 * @template TModel of Card
 *
 * @extends ParentFactory<TModel>
 */
class CardFactory extends ParentFactory
{
    /** @var class-string<TModel> */
    protected $model = Card::class;

    public function definition(): array
    {
        return [];
    }
}
