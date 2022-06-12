<?php

namespace Tests\Feature\Admin;

use App\Models\Site;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AdminTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->signIn();
    }

    /**
     * 管理员列表
     * @test
     */
    public function siteAdminList()
    {
        $users = create(User::class, 3);
        $site = create(Site::class, null, ['user_id' => $this->user->id]);

        $site->admins()->attach($users->pluck('id'));

        $this->assertEquals($site->admins->count(), 3);
    }
}
