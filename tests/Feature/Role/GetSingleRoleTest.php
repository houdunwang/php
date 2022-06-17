<?php

namespace Tests\Feature\Role;

use App\Models\Role;
use App\Models\Site;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class GetSingleRoleTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    /**
     * 获取单个角色
     * @test
     */
    public function getSingleRole()
    {
        $role = create(Role::class);
        $response = $this->get("/api/site/{$this->site->id}/role/{$role['id']}");

        $response->assertSuccessful()->assertJson(['data' => []]);
    }
}
