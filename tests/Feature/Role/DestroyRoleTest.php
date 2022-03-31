<?php

namespace Tests\Feature\Role;

use App\Models\Role;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Testing\Fluent\AssertableJson;
use Tests\TestCase;

class DestroyRoleTest extends TestCase
{
    use RefreshDatabase;

    /**
     * 删除角色
     * @test
     */
    public function deleteRole()
    {
        $this->signIn();

        $role = create(Role::class);

        $response = $this->deleteJson("/api/role/{$role->id}");

        $response->assertSuccessful()->assertJsonStructure(['message']);
    }
}
