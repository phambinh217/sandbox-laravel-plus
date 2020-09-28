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
        $result = $this->execute(function ($success, $error) {
            return $success('Hello world');
        });

        $this->assertTrue($result->isSuccess());
    }

    /**
     * @test
     */
    public function execute_is_success_test()
    {
        $result = $this->execute(function ($success, $error) {
            return $success('Hello world');
        });

        $this->assertTrue($result->isSuccess());
    }

    /**
     * @test
     */
    public function execute_has_error_test()
    {
        $result = $this->execute(function ($success, $error) {
            return $error('Hello world');
        });

        $this->assertTrue($result->hasError());
    }

    /**
     * @test
     */
    public function execute_with_dynamic_variable_test()
    {
        $input = 'Hello world';
        $result = $this->execute(function ($success, $error) use ($input) {
            if ($input == 'Hello world') {
                return $success();
            }

            return $error();
        });

        $this->assertTrue($result->isSuccess());
    }
}
