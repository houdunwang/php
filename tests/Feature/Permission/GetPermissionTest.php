<?php

namespace Tests\Feature\Permission;

use App\Models\Permission;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Testing\Fluent\AssertableJson;
use Tests\TestCase;

class GetPermissionTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    protected function setUp(): void
    {
        parent::setUp();
        $this->signIn();
    }

    /**
     * 获取权限列表
     * @test
     */
    public function accessPermissionsList()
    {
        $response = $this->getJson('/api/permission')->assertSuccessful();

        $response->assertJson([
            'status' => 'success',
        ]);
    }

    /**
     * 获取权限
     * @test
     */
    public function accessPermissions()
    {
        $permission = Permission::create(['name' => $this->faker()->word(), 'title' => $this->faker()->word()]);

        $response = $this->getJson('/api/permission/' . $permission->id)->assertOk();

        $response->assertJson([
            'status' => 'success',
            'data' => []
        ]);
    }
}