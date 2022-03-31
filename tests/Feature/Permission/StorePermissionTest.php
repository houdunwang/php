<?php

namespace Tests\Feature\Permission;

use App\Models\Permission;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Testing\Fluent\AssertableJson;
use Tests\TestCase;

class StorePermissionTest extends TestCase
{
    use WithFaker, RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->signIn();
    }

    /**
     * 权限标识和描述不能为空
     * @test
     */
    public function nameAndTitleCannotBeEmpty()
    {
        $response = $this->postJson('/api/permission', []);

        $response->assertStatus(422)->assertJsonValidationErrors(['name', 'title']);
    }

    /**
     * 标识与描述不能重复
     * @test
     */
    public function nameAndTitleDoNotRepeat()
    {
        $this->postJson('/api/permission', [
            'name' => 'hd',
            'title' => 'hd',
        ]);

        $response = $this->postJson('/api/permission', [
            'name' => 'hd',
            'title' => 'hd',
        ]);

        $response->assertStatus(422)->assertJsonValidationErrors(['name', 'title']);
    }
}
