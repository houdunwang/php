<?php

namespace Tests\Feature\User;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class FollowerTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->signIn();
    }

    /**
     * 关注用户
     * @test
     */
    public function follower()
    {
        $follower = create(User::class);
        $this->getJson('/api/user/follower/' . $follower->id)->assertStatus(200);

        $this->assertTrue($this->user->followers->contains($follower));
    }

    /**
     * 取消关注
     * @test
     */
    public function unFollower()
    {
        $follower = create(User::class);
        $this->user->followers()->attach($follower->id);
        $this->assertCount(1, $this->user->followers);

        $this->getJson('/api/user/follower/' . $follower->id)->assertStatus(200);

        $this->assertCount(0, $this->user->fresh()->followers);
    }
}
