<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

/**
 * Class RoleTest
 */
class RoleTest extends TestCase
{

    use DatabaseTransactions;

    /**
     * @return void
     */
    public function test_role_store_process()
    {
        $response = $this->post('/api/roles', [
            'name' => 'Admin',
        ]);
        $response->assertStatus(201);
    }

    /**
     * @return void
     */
    public function test_role_index_process()
    {
        $this->post('/api/roles', [
            'name' => 'Admin',
        ]);
        $response = $this->get('/api/roles')->assertJson([
            'data' => [
                [
                    'name' => 'Admin',
                ],
            ],
        ]);
        $response->assertStatus(200);
    }

    /**
     * @return void
     */
    public function test_role_show_process()
    {
        $role = $this->post('/api/roles', [
            'name' => 'Admin',
        ]);
        $response = $this->get('/api/roles/' . $role['data']['id'])->assertJson([
            'data' => [
                'name' => 'Admin',
            ],
        ]);
        $response->assertStatus(200);
    }

    /**
     * @return void
     */
    public function test_role_update_process()
    {
        $role = $this->post('/api/roles', [
            'name' => 'Admin',
        ]);
        $response = $this->put('/api/roles/' . $role['data']['id'], [
            'name' => 'Super Admin',
        ])->assertJson([
            'data' => [
                'name' => 'Super Admin',
            ]
        ]);
        $response->assertStatus(200);
    }

    /**
     * @return void
     */
    public function test_role_delete_process()
    {
        $role = $this->post('/api/roles', [
            'name' => 'Admin',
        ]);
        $response = $this->delete('/api/roles/' . $role['data']['id']);
        $response->assertStatus(200);
    }

}
