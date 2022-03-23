<?php

namespace Tests\Feature\ValidateCode;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class GuestValideCodeTest extends TestCase
{
    use RefreshDatabase;

    /**
     * 发送邮件验证码
     * @test
     */
    public function emailVerificationCode()
    {
        $user = User::factory()->make();
        $this->post('/api/code/send', [
            'account' => $user->email
        ])->assertOk();
    }

    /**
     * 邮箱格式错误
     * @test
     */
    public function emailFormatError()
    {
        $this->post('/api/code/send', [
            'account' => 'hd'
        ])->assertSessionHasErrors('account');
    }

    /**
     * 重复发送验证码
     * @test
     */
    public function repeatSendVerificationCode()
    {
        $user = User::factory()->make();
        $this->post('/api/code/send', [
            'account' => $user->email
        ]);

        $this->post('/api/code/send', [
            'account' => $user->email
        ])->assertStatus(403);
    }
}
