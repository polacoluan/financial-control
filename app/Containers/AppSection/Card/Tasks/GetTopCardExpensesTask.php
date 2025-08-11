<?php

namespace App\Containers\AppSection\Card\Tasks;

use App\Containers\AppSection\Card\Data\Repositories\CardRepository;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Illuminate\Support\Facades\DB;

class GetTopCardExpensesTask extends ParentTask
{
    public function __construct(
        private readonly CardRepository $repository
    ) {}

    public function run(string $start, string $end): array
    {
        $totalExpenses = DB::table('expenses')
            ->whereBetween('date', [$start, $end])
            ->sum('amount') ?: 0;

        return DB::table('cards')
            ->select([
                'cards.id',
                'cards.description',
                DB::raw('COALESCE(SUM(expenses.amount), 0) as total_expenses'),
                DB::raw('CAST(
                    CASE 
                        WHEN ' . $totalExpenses . ' > 0 
                        THEN (COALESCE(SUM(expenses.amount), 0) / ' . $totalExpenses . ' * 100) 
                        ELSE 0 
                    END 
                AS UNSIGNED) as percentage')
            ])
            ->leftJoin('expenses', function ($join) use ($start, $end) {
                $join->on('expenses.card_id', '=', 'cards.id')
                    ->where('expenses.date', '>=', $start)
                    ->where('expenses.date', '<=', $end);
            })
            ->groupBy('cards.id', 'cards.description')
            ->orderByDesc('total_expenses')
            ->limit(5)
            ->get()
            ->toArray();
    }
}
