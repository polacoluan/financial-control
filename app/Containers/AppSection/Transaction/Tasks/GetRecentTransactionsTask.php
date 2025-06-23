<?php

namespace App\Containers\AppSection\Transaction\Tasks;

use App\Ship\Parents\Tasks\Task as ParentTask;
use Illuminate\Support\Facades\DB;

class GetRecentTransactionsTask extends ParentTask
{
    public function run(): mixed
    {
        return DB::table('expenses')
            ->select('expense', 'amount')
            ->get();
    }
}
