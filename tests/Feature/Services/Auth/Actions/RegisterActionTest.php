<?php

namespace Tests\Feature\Services\Auth\Actions;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;

class RegisterActionTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;


    public function setUp(): void
    {
        parent::setUp();

        $this->userService = app(\App\Services\User\UserService::class);
    }

    /**
     * @test
     */
    public function can_register()
    {
        $totalUserBeforeRegister = $this->userService->query()->count();

        app(\App\Services\Auth\Actions\RegisterAction::class)->handle([
            'name' => $this->faker->name,
            'email' => $this->faker->email,
            'password' => $this->faker->password,
        ]);

        $totalUserAfterRegister = $this->userService->query()->count();

        $this->assertEquals($totalUserAfterRegister, $totalUserBeforeRegister + 1);
    }

    /**
     * @test
     */
    public function canot_register_with_empty_email()
    {
        $totalUserBeforeRegister = $this->userService->query()->count();

        $result = app(\App\Services\Auth\Actions\RegisterAction::class)->handle([
            'name' => $this->faker->name,
            'password' => $this->faker->password,
        ]);

        $this->assertTrue($result->hasError());
    }

    /**
     * @test
     */
    public function canot_register_with_empty_name()
    {
        $totalUserBeforeRegister = $this->userService->query()->count();

        $result = app(\App\Services\Auth\Actions\RegisterAction::class)->handle([
            'password' => $this->faker->password,
        ]);

        $this->assertTrue($result->hasError());
    }

    /**
     * @test
     */
    public function canot_register_with_empty_password()
    {
        $totalUserBeforeRegister = $this->userService->query()->count();

        $result = app(\App\Services\Auth\Actions\RegisterAction::class)->handle([
            'name' => $this->faker->name,
            'email' => $this->faker->email,
        ]);

        $this->assertTrue($result->hasError());
    }

    /**
     * @test
     */
    public function canot_register_with_short_password()
    {
        $totalUserBeforeRegister = $this->userService->query()->count();

        $result = app(\App\Services\Auth\Actions\RegisterAction::class)->handle([
            'name' => $this->faker->name,
            'email' => $this->faker->email,
            'password' => 1,
        ]);

        $this->assertTrue($result->hasError());
    }

    /**
     * @test
     */
    public function canot_register_with_existsed_email()
    {
        $totalUserBeforeRegister = $this->userService->query()->count();

        $email = $this->faker->email;
        app(\App\Services\Auth\Actions\RegisterAction::class)->handle([
            'name' => $this->faker->name,
            'email' => $email,
            'password' => $this->faker->password,
        ]);

        $result = app(\App\Services\Auth\Actions\RegisterAction::class)->handle([
            'name' => $this->faker->name,
            'email' => $email,
            'password' => $this->faker->password,
        ]);

        $this->assertTrue($result->hasError());
    }
}
