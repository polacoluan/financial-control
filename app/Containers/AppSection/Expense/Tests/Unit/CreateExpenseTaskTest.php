<?php

namespace App\Containers\AppSection\Expense\Tests\Unit;

use App\Containers\AppSection\Expense\Events\ExpenseCreated;
use App\Containers\AppSection\Expense\Models\Expense;
use App\Containers\AppSection\Expense\Tasks\CreateExpenseTask;
use App\Containers\AppSection\Expense\Data\Repositories\ExpenseRepository;
use App\Containers\AppSection\Expense\Tests\UnitTestCase;
use Illuminate\Support\Facades\Event;
use Mockery;
use PHPUnit\Framework\Attributes\CoversClass;

#[CoversClass(CreateExpenseTask::class)]
final class CreateExpenseTaskTest extends UnitTestCase
{
    public function testRunCreatesExpense(): void
    {
        Event::fake();
        $repository = Mockery::mock(ExpenseRepository::class);
        $expense = new Expense();
        $repository->expects('create')->once()->andReturn($expense);

        $task = new CreateExpenseTask($repository);
        $result = $task->run([]);

        $this->assertSame($expense, $result);
        Event::assertDispatched(ExpenseCreated::class);
    }
}
