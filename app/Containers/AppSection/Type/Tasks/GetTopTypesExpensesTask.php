<?php

namespace App\Containers\AppSection\Type\Tasks;

use App\Containers\AppSection\Type\Data\Repositories\TypeRepository;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Illuminate\Support\Facades\DB;

class GetTopTypesExpensesTask extends ParentTask
{
    public function __construct(
        private readonly TypeRepository $repository
    ) {}

    public function run(string $start, string $end): array
    {
        $totalExpenses = DB::table('expenses')
            ->whereBetween('date', [$start, $end])
            ->sum('amount') ?: 0;

        return DB::table('types')
            ->select([
                'types.id',
                'types.description',
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
                $join->on('expenses.type_id', '=', 'types.id')
                    ->where('expenses.date', '>=', $start)
                    ->where('expenses.date', '<=', $end);
            })
            ->groupBy('types.id', 'types.description')
            ->orderByDesc('total_expenses')
            ->limit(5)
            ->get()
            ->toArray();
    }
}
