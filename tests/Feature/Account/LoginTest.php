<?php

namespace Tests\Feature\Account;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserLoginTest extends TestCase
{
    use RefreshDatabase;

    /**
     * 登录成功
     * @test
     */
    public function loginSuccessful()
    {
        $user = User::factory()->create();
        $response = $this->post('/api/login', ['account' => $user->email, 'password' => 'admin888']);

        $response->assertSee('token');
    }

    /**
     * 登录帐号错误
     * @test
     */
    public function loginAccountErrors()
    {
        $response = $this->post('/api/login', ['account' => 'hd', 'password' => 'admin888']);
        $response->assertSessionHasErrors('account');
    }

    /**
     * 帐号为空
     * @test
     */
    public function theAccountIsEmpty()
    {
        $response = $this->post('/api/login', ['password' => 'admin888']);
        $response->assertSessionHasErrors('account');
    }

    /**
     * 密码输入错误
     * @test
     */
    public function thePasswordInputError()
    {
        $user = User::factory()->create();
        $response = $this->post('/api/login', ['account' => $user->email, 'password' => 'hd888']);
        $response->assertSessionHasErrors('password');
    }

    /**
     * 邮箱不存在
     * @test
     */
    public function accountNotExists()
    {
        $response = $this->post('/api/login', ['account' => 'test@qq.com', 'password' => 'admin888']);
        $response->assertSessionHasErrors('account');
    }
}
