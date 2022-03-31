<?php

namespace Tests\Feature\Role;

use App\Models\Role;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class GetRoleTest extends TestCase
{
    use RefreshDatabase, WithFaker;
    protected function setUp(): void
    {
        parent::setUp();
        $this->signIn();
    }

    /**
     * 获取角色列表
     * @test
     */
    public function getTheRoleList()
    {
        $response = $this->get('/api/role');

        $response->assertSuccessful()->assertJson(['data' => []]);
    }

    /**
     * 获取角色
     * @test
     */
    public function getSingleAcessRole()
    {
        $role = create(Role::class);
        $response = $this->get("/api/role/{$role['id']}");

        $response->assertSuccessful()->assertJson(['data' => []]);
    }
}
