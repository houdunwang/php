<?php

namespace Tests\Feature\Account;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class ForgetPasswordTest extends TestCase
{
    use RefreshDatabase;

    protected function data()
    {
        $user = create(User::class);
        return [
            'account' => $user->email,
            'password' => 'admin999',
            'password_confirmation' => 'admin999',
        ];
    }
    /**
     * 表单输入错误
     * @test
     */
    public function formInputErrors()
    {
        $response = $this->post('/api/account/forget-password', []);

        $response->assertSessionHasErrors(['code', 'account', 'password']);
    }

    /**
     * 重设密码成功
     * @test
     */
    public function toResetThePasswordSuccessfully()
    {
        $user = create(User::class);
        $response = $this->post('/api/code/send', [
            'account' => $user->email,
        ]);

        $response->assertStatus(200);
        $this->assertEquals($user->email, User::first()->email);

        $response = $this->post('/api/account/forget-password', [
            'account' => $user->email,
            'password' => 'admin999',
            'password_confirmation' => 'admin999',
            'code' => $response->json('code'),
        ]);

        $response->assertOk();
        $this->assertTrue(Hash::check('admin999', User::first()->password));
    }
}
