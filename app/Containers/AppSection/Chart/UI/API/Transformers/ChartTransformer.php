<?php

namespace App\Containers\AppSection\Chart\UI\API\Transformers;

use App\Ship\Parents\Transformers\Transformer as ParentTransformer;
use Carbon\Carbon;

class ChartTransformer extends ParentTransformer
{
    public function transform(array $data): array
    {

        $categoriesData = [];
        $categoryCount = 0;
        foreach ($data['categories'] as $category => $amount) {
            $categoryCount++;
            $categoriesData[] = [
                'category' => $category,
                'amount'   => round($amount, 2),
                'fill'   => "hsl(var(--chart-$categoryCount))",
            ];
        }

        $typesData = [];
        $typeCount = 0;
        foreach ($data['types'] as $type => $amount) {
            $typeCount++;
            $typesData[] = [
                'type' => $type,
                'amount'   => round($amount, 2),
                'fill'   => "hsl(var(--chart-$typeCount))",
            ];
        }

        $cardsData = [];
        $cardCount = 0;
        foreach ($data['cards'] as $card => $amount) {
            $cardCount++;
            $cardsData[] = [
                'card' => $card,
                'amount'   => round($amount, 2),
                'fill'   => "hsl(var(--chart-$cardCount))",
            ];
        }


        $datesData = [];
        $dateCount = 0;
        foreach ($data['dates'] as $date => $amount) {
            $dateCount++;
            $datesData[] = [
                'date' => Carbon::parse($date)->format("d/m"),
                'amount'   => round($amount, 2),
                'fill'   => "hsl(var(--chart-$dateCount))",
            ];
        }

        return [
            'total_expenses' => $data['totalExpenses'],
            'total_incomes' => $data['totalIncomes'],
            'total' => $data['total'],
            'categories' => $categoriesData,
            'types' => $typesData,
            'cards' => $cardsData,
            'dates' => $datesData,
        ];
    }
}
