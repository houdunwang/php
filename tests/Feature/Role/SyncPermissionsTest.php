<?php

namespace Tests\Feature\Role;

use App\Models\Role;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SyncPermissionsTest extends TestCase
{
    use RefreshDatabase;

    /**
     * 同步角色权限
     * @test
     */
    public function syncRolePermissions()
    {
        $role = create(Role::class);
        $permissions = create(\App\Models\Permission::class, 3);

        $response = $this->signIn()->post('/api/role/' . $role->id . '/permission', [
            'permissions' => $permissions->pluck('id')->toArray()
        ])->assertSuccessful()->assertJson(['message' => '同步成功']);

        $this->assertCount(3, $role->permissions);
    }
}
