<?php

namespace Tests\Feature\Permission;

use App\Models\Permission;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UpdatePermissionTest extends TestCase
{
    use WithFaker, RefreshDatabase;

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
        $permission = create(Permission::class);

        $response = $this->putJson("/api/permission/{$permission['id']}");

        $response->assertStatus(422)->assertJsonValidationErrors(['name', 'title']);
    }

    /**
     * 字段不能重复
     * @test
     */
    public function fieldCannotBeRepeated()
    {
        $permission1 = create(Permission::class);
        $permission2 = create(Permission::class);

        $response = $this->putJson("/api/permission/{$permission2['id']}", [
            'name' => $permission1['name'],
            'title' => $permission1['title'],
        ]);

        $response->assertStatus(422)->assertJsonValidationErrors(['name', 'title']);
    }

    /**
     * 更新权限
     * @test
     */
    public function updatePermission()
    {
        create(Permission::class);
        $permission2 = create(Permission::class);

        $response = $this->putJson("/api/permission/{$permission2['id']}", [
            'name' => $this->faker()->word(),
            'title' => $this->faker()->word(),
        ]);

        $response->assertOk()->assertJsonMissingValidationErrors(['name', 'title'])->assertJson(['data' => []]);
    }
}
