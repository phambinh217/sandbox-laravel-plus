<?php

namespace Tests\Feature\Http\Controllers\AuthController;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Models\User;

class RegisterTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    /**
     * @test
     */
    public function can_register()
    {
        $response = $this->postJson(route('auth.register'), [
            'name' => $this->faker->name,
            'email' => $this->faker->email,
            'password' => $this->faker->password,
        ]);

        $response->assertStatus(200);
    }

    /**
     * @test
     */
    public function can_not_register_with_empty_password()
    {
        $response = $this->postJson(route('auth.register'), [
            'name' => $this->faker->name,
            'email' => $this->faker->email,
        ]);

        $response->assertStatus(422);
    }

    /**
     * @test
     */
    public function can_not_register_with_existed_email()
    {
        $user = User::factory()->create();

        $response = $this->postJson(route('auth.register'), [
            'name' => $this->faker->name,
            'email' => $user->email,
            'password' => $this->faker->password,
        ]);

        $response->assertStatus(422);
    }
}
