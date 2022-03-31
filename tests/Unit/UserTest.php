<?php

namespace Tests\Unit;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserTest extends TestCase
{
    use RefreshDatabase;

    /**
     * 用户默认头像
     * @test
     */
    public function theUserTheDefaultAvatar()
    {
        $user = create(User::class);
        $this->assertEquals($user->avatar_url, url('images/avatar.png'));
    }
}
