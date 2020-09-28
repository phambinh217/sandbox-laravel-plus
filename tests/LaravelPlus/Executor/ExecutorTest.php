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
        $result = $this->execute(function ($pass, $fail) {
            return $pass('Hello world');
        });

        $this->assertTrue($result->isPass());
    }

    /**
     * @test
     */
    public function execute_is_pass_test()
    {
        $result = $this->execute(function ($pass, $fail) {
            return $pass('Hello world');
        });

        $this->assertTrue($result->isPass());
    }

    /**
     * @test
     */
    public function execute_is_fail_test()
    {
        $result = $this->execute(function ($pass, $fail) {
            return $fail('Hello world');
        });

        $this->assertTrue($result->isFail());
    }

    /**
     * @test
     */
    public function execute_with_dynamic_variable_test()
    {
        $input = 'Hello world';
        $result = $this->execute(function ($pass, $fail) use ($input) {
            if ($input == 'Hello world') {
                return $pass();
            }

            return $fail();
        });

        $this->assertTrue($result->isPass());
    }
}
