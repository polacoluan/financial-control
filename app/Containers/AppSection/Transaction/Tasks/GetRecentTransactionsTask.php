<?php

namespace App\Containers\AppSection\Transaction\Tasks;

use App\Ship\Parents\Tasks\Task as ParentTask;
use Illuminate\Support\Facades\DB;

class GetRecentTransactionsTask extends ParentTask
{
    public function run(): mixed
    {
        return DB::table('expenses')
            ->select([
                'expense as name',
                'amount',
                'date',
                DB::raw("'expense' as transaction_type"),
            ])
            ->unionAll(
                DB::table('incomes')
                    ->select([
                        'income as name',
                        'amount',
                        'date',
                        DB::raw("'income' as transaction_type"),
                    ])
            )
            ->orderByDesc('date')
            ->limit(5)
            ->get()
            ->map(fn ($row) => (array) $row)
            ->toArray();
    }
}
