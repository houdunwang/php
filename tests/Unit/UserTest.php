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

    /**
     * 关注列表
     * @test
     */
    public function followerList()
    {
        $user = create(User::class);
        $followers = create(User::class, 10);
        $user->followers()->syncWithoutDetaching($followers->pluck('id'));
        $this->assertCount(10, $user->followers);
    }

    /**
     * 粉丝列表
     * @test
     */
    public function fansList()
    {
        $user = create(User::class);
        $fans = create(User::class, 10);
        $user->fans()->syncWithoutDetaching($fans->pluck('id'));
        $this->assertCount(10, $user->fans);
    }
}
