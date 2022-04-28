<?php

namespace Tests\Feature\Account;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LogoutTest extends TestCase
{
    use RefreshDatabase;
    /**
     * 退出登录
     * @test
     */
    public function logout()
    {
        $this->signIn();
        $response = $this->getJson('/api/logout')->assertOk();

        $response->assertStatus(200)->assertSee(['status' => 'success']);
    }
}
