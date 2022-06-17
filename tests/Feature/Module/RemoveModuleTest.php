<?php

namespace Tests\Feature\Module;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class RemoveModuleTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    /**
     * 设计添加新模块
     * @test
     */
    public function removeModule()
    {
        $name = $this->faker()->word();

        $this->postJson("/api/module", [
            'title' => $this->faker()->word(),
            'name' => $name,
            'version' => '1.0.0',
            'author' => '后盾人'
        ])->assertSuccessful();

        $response = $this->deleteJson("/api/module/{$name}")->assertSuccessful();
    }
}
