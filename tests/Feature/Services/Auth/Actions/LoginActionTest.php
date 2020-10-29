<?php

namespace Tests\Feature\Services\Auth\Actions;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Models\User;
use App\Services\Auth\Actions\AuthService;
use Hash;

class LoginActionTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;


    public function setUp(): void
    {
        parent::setUp();

        $this->authService = app(\App\Services\Auth\AuthService::class);
    }

    /**
     * @test
     */
    public function can_login()
    {
        $user = User::factory()->create([
            'password' => Hash::make('123123')
        ]);

        $result = $this->authService->login([
            'email' => $user->email,
            'password' => '123123'
        ]);

        $this->assertTrue($result->isSuccess());
    }

    /**
     * @test
     */
    public function can_not_login_with_empty_password()
    {
        $user = User::factory()->create([
            'password' => Hash::make('123123')
        ]);

        $result = $this->authService->login([
            'email' => $user->email,
        ]);

        $this->assertTrue($result->hasError());
    }

    /**
     * @test
     */
    public function can_not_login_with_incorrect_info()
    {
        $result = $this->authService->login([
            'email' => $this->faker->email,
            'password' => $this->faker->password,
        ]);

        $this->assertTrue($result->hasError());
    }
}
