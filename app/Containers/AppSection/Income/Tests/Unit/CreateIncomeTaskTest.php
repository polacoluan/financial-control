<?php

namespace App\Containers\AppSection\Income\Tests\Unit;

use App\Containers\AppSection\Income\Events\IncomeCreated;
use App\Containers\AppSection\Income\Models\Income;
use App\Containers\AppSection\Income\Tasks\CreateIncomeTask;
use App\Containers\AppSection\Income\Data\Repositories\IncomeRepository;
use App\Containers\AppSection\Income\Tests\UnitTestCase;
use Illuminate\Support\Facades\Event;
use Mockery;
use PHPUnit\Framework\Attributes\CoversClass;

#[CoversClass(CreateIncomeTask::class)]
final class CreateIncomeTaskTest extends UnitTestCase
{
    public function testRunCreatesIncome(): void
    {
        Event::fake();
        $repository = Mockery::mock(IncomeRepository::class);
        $income = new Income();
        $repository->expects('create')->once()->andReturn($income);

        $task = new CreateIncomeTask($repository);
        $result = $task->run([]);

        $this->assertSame($income, $result);
        Event::assertDispatched(IncomeCreated::class);
    }
}
