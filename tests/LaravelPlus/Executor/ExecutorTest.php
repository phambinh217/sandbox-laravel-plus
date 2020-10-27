<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use Phambinh217\LaravelPlus\Executor\Execute;
use Phambinh217\LaravelPlus\Executor\Result;

class ExecutorTest extends TestCase
{
    use Execute;

    /**
     * @test
     */
    public function execute_with_trait_test()
    {
        $result = $this->execute(function () {
            return 'Hello world';
        });

        $this->assertEquals($result, 'Hello world');
    }
}
