<?php

namespace Tests\Feature\Account;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RegisterTest extends TestCase
{
    use RefreshDatabase;

    protected $data = [
        'account' => '2300071698@qq.com',
        'password' => 'admin888',
        'password_confirmation' => 'admin888',
    ];

    /**
     * 用户成功注册
     * @test
     */
    public function userRegistrationSuccess()
    {
        $response = $this->post('/api/register', $this->data);
        $response->assertStatus(200);
    }

    /**
     * 非法邮箱验证
     * @test
     */
    public function registerAccountValidate()
    {
        $response = $this->post('/api/register', ['account' => 'hd'] + $this->data);
        $response->assertSessionHasErrors('account');
    }

    /**
     * 帐号不唯一
     * @test
     */
    public function accountIsNotTheOnly()
    {
        $data = $this->data;
        unset($data['account']);
        $response = $this->post('/api/register', $data);
        $response->assertSessionHasErrors('account');
    }

    /**
     * 帐号重复
     * @test
     */
    public function repeatAccount()
    {
        $response1 = $this->post('/api/register', $this->data);
        $response2 = $this->post('/api/register', $this->data);
        $response2->assertSessionHasErrors('account');
    }
}
