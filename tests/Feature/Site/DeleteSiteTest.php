<?php

namespace Tests\Feature\Site;

use App\Models\Site;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DeleteSiteTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    protected $seed = true;

    protected $site;

    protected function setUp(): void
    {
        parent::setUp();
        $this->signIn();
        $this->site = create(Site::class, null, ['title' => $this->faker()->sentence(), 'user_id' => $this->user->id]);
    }

    /**
     * 删除身份验证
     * @test
     */
    public function deleteAuthentication()
    {
        $site = create(Site::class, null, ['user_id' => 1]);
        $this->deleteJson('/api/site/' . $site->id)->assertStatus(403);
    }

    /**
     * 成功删除站点
     * @test
     */
    public function deletedSuccessfullySite()
    {
        $this->deleteJson('/api/site/' . $this->site->id)->assertStatus(200);
    }
}
