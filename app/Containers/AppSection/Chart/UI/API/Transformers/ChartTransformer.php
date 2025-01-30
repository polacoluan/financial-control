<?php

namespace App\Containers\AppSection\Chart\UI\API\Transformers;

use App\Ship\Parents\Transformers\Transformer as ParentTransformer;

class ChartTransformer extends ParentTransformer
{
    public function transform(array $data): array
    {

        $categoriesData = [];
        foreach ($data['categories'] as $category => $amount) {
            $categoriesData[] = [
                'category' => $category,
                'amount'   => round($amount, 2),
            ];
        }

        $typesData = [];
        foreach ($data['types'] as $type => $amount) {
            $typesData[] = [
                'type' => $type,
                'amount'   => round($amount, 2),
            ];
        }

        $cardsData = [];
        foreach ($data['cards'] as $card => $amount) {
            $cardsData[] = [
                'card' => $card,
                'amount'   => round($amount, 2),
            ];
        }


        $datesData = [];
        foreach ($data['dates'] as $date => $amount) {
            $datesData[] = [
                'date' => $date,
                'amount'   => round($amount, 2),
            ];
        }

        return [
            'total_amount' => $data['totalAmount'],
            'categories' => $categoriesData,
            'types' => $typesData,
            'cards' => $cardsData,
            'dates' => $datesData,
        ];
    }
}