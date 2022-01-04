<?php

namespace Tests\Feature;

use App\Models\User;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

/**
 * Class UserTest
 */
class UserTest extends TestCase
{

    /**
     * @return void
     */
    public function test_user_fields()
    {
        $response = $this->post('/api/sign-up', [
            'name'                  => null,
            'email'                 => null,
            'password'              => null,
            'password_confirmation'  => null,
        ]);
        $response->assertStatus(302);
    }

    /**
     * @return void
     */
    public function test_user_register()
    {
        $user = User::factory()->make();
        $response = $this->post('/api/sign-up', [
            'name'                  => $user['name'],
            'email'                 => $user['email'],
            'password'              => '123456',
            'password_confirmation'  => '123456',
        ]);
        $response->assertStatus(201);
    }

    /**
     * @return void
     */
    public function test_user_login()
    {
        Sanctum::actingAs(
            User::factory()->create(),
            ['*']
        );
        $response = $this->get('/api/user');
        $response->assertOk();
    }

}
