<?php

namespace App\Containers\AppSection\Card\UI\API\Transformers;

use App\Containers\AppSection\Card\Models\Card;
use App\Ship\Parents\Transformers\Transformer as ParentTransformer;

class CardTransformer extends ParentTransformer
{
    protected array $defaultIncludes = [];

    protected array $availableIncludes = [];

    public function transform(Card $card): array
    {
        return [
            'object' => $card->getResourceKey(),
            'id' => $card->getHashedKey(),
            'card' => $card->card,
            'description' => $card->description,
            'is_default' => $card->is_default ? true : false,
            'created_at' => $card->created_at,
            'updated_at' => $card->updated_at,
            'readable_created_at' => $card->created_at->diffForHumans(),
            'readable_updated_at' => $card->updated_at->diffForHumans(),
        ];
    }
}
