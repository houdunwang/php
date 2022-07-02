<?php

namespace Tests\Feature\Role;

use App\Models\Role;
use App\Models\Site;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Str;
use Tests\TestCase;

class StoreRoleTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    /**
     * 字段不能为空
     * @test
     */
    public function fieldCannotBeEmpty()
    {
        $response = $this->postJson("/api/site/{$this->site->id}/role");

        $response->assertStatus(422)->assertJsonValidationErrors(['name', 'title']);
    }

    /**
     * 不能添加已经存在的字段
     * @test
     */
    public function dontAddExistingFields()
    {
        $role = create(Role::class, null, ['site_id' => $this->site->id]);
        $response = $this->postJson("/api/site/{$this->site->id}/role", [
            'name' => $role->name,
            'title' => $role->title
        ]);

        $response->assertStatus(422)->assertJsonValidationErrors(['name', 'title']);
    }

    /**
     * 成功添加角色
     * @test
     */
    public function addRoleSuccess()
    {
        $response = $this->postJson("/api/site/{$this->site->id}/role", [
            'name' => Str::random(10),
            'title' => $this->faker()->title()
        ]);

        $response->assertSuccessful()->assertJson(['status' => 'success']);
    }
}
