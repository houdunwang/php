<?php

namespace Tests\Feature\Role;

use App\Models\Role;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UpdateRoleTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    protected function setUp(): void
    {
        parent::setUp();
        $this->signIn();
    }
    /**
     * 字段不能为空
     * @test
     */
    public function roleFieldCannotBeEmpty()
    {
        $role = create(Role::class);

        $response = $this->putJson("/api/role/{$role['id']}");

        $response->assertStatus(422)->assertJsonValidationErrors(['name', 'title']);
    }

    /**
     * 不能添加已经存在的字段
     * @test
     */
    public function dontUpdateExistingRoleFields()
    {
        $role1 = create(Role::class);
        $role2 = create(Role::class);
        $response = $this->putJson("/api/role/{$role2['id']}", [
            'name' => $role1->name,
            'title' => $role1->title
        ]);

        $response->assertStatus(422)->assertJsonValidationErrors(['name', 'title']);
    }

    /**
     * 添加角色
     * @test
     */
    public function updateRoleSuccess()
    {
        $role = create(Role::class, null, ['title' => $this->faker()->word()]);

        $response = $this->putJson("/api/role/{$role['id']}", [
            'name' => $this->faker()->word(),
            'title' => $this->faker()->title()
        ]);

        $response->assertSuccessful()->assertJson(['data' => true]);
    }
}
