<?php

namespace App\Containers\AppSection\Category\Tasks;

use App\Containers\AppSection\Category\Data\Repositories\CategoryRepository;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Illuminate\Support\Facades\DB;

class GetTopCategoriesExpensesTask extends ParentTask
{
    public function __construct(
        private readonly CategoryRepository $repository
    ) {}

    public function run(int $month, int $year): array
    {
        $totalExpenses = DB::table('expenses')
            ->whereMonth('date', $month)
            ->whereYear('date', $year)
            ->sum('amount') ?: 0;

        return DB::table('categories')
            ->select([
                'categories.id',
                'categories.description',
                DB::raw('COALESCE(SUM(expenses.amount), 0) as total_expenses'),
                DB::raw('CAST(
                    CASE 
                        WHEN ' . $totalExpenses . ' > 0 
                        THEN (COALESCE(SUM(expenses.amount), 0) / ' . $totalExpenses . ' * 100) 
                        ELSE 0 
                    END 
                AS UNSIGNED) as percentage')
            ])
            ->leftJoin('expenses', function ($join) use ($month, $year) {
                $join->on('expenses.category_id', '=', 'categories.id')
                    ->whereMonth('expenses.date', $month)
                    ->whereYear('expenses.date', $year);
            })
            ->groupBy('categories.id', 'categories.description')
            ->orderByDesc('total_expenses')
            ->limit(5)
            ->get()
            ->toArray();
    }
}
