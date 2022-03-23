<?php

namespace Tests\Unit;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Cache;
use PHPUnit\Framework\ExpectationFailedException;
// use PHPUnit\Framework\TestCase;
use SebastianBergmann\RecursionContext\InvalidArgumentException;
use Tests\TestCase;

class ValidateCodeTest extends TestCase
{
    use RefreshDatabase;

    /**
     * 邮件验证码
     * @test
     */
    public function emailVerificationCode()
    {
        $user = User::factory()->make();
        $code = app('code')->email($user->email);
        $this->assertEquals(Cache::get($user->email), $code);
    }

    /**
     * 手机验证码
     * @test
     */
    public function mobilePhoneVerificationCode()
    {
        $user = create(User::class);
        $code = app('code')->mobile(18600276067);
        $this->assertNotNull($code);
    }
}
