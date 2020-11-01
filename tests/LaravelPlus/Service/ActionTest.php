<?php

namespace Tests\LaravelPlus\Service;

use Tests\TestCase;
use Phambinh217\LaravelPlus\Exceptions\ActionNotFound;

class ActionTest extends TestCase
{
    /**
     * @test
     */
    public function throw_exception_if_action_not_found()
    {
        $service = app(ServiceMocking::class);
        $hasException = false;

        try {
            $service->helloWorld();
        } catch (ActionNotFound $e) {
            $hasException = true;
        }

        $this->assertTrue($hasException);
    }
}
