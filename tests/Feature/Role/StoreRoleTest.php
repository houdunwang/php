<?php

namespace Tests\Feature\Role;

use App\Models\Role;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class StoreRoleTest extends TestCase
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
    public function fieldCannotBeEmpty()
    {
        $response = $this->postJson('/api/role');

        $response->assertStatus(422)->assertJsonValidationErrors(['name', 'title']);
    }

    /**
     * 不能添加已经存在的字段
     * @test
     */
    public function dontAddExistingFields()
    {
        $permission = create(Role::class);
        $response = $this->postJson('/api/role', [
            'name' => $permission->name,
            'title' => $permission->title
        ]);
        $response->assertStatus(422)->assertJsonValidationErrors(['name', 'title']);
    }

    /**
     * 添加角色
     * @test
     */
    public function addRoleSuccess()
    {
        $response = $this->postJson('/api/role', [
            'name' => $this->faker()->word(),
            'title' => $this->faker()->title()
        ]);
        $response->assertSuccessful()->assertJson(['data' => true]);
    }
}
