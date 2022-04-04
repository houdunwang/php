<?php

namespace Tests\Feature\User;

use App\Models\Role;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserRoleTest extends TestCase
{
    use RefreshDatabase;

    /**
     * 设置用户角色
     * @test
     */
    public function setUserRole()
    {
        $this->withoutExceptionHandling();
        $user = create(User::class);
        $role = create(Role::class);
        $response = $this->actingAs($user)->post('/api/user/' . $user->id . '/role/' . $role->id);
        $this->assertCount(1, $user->roles);
    }
}
