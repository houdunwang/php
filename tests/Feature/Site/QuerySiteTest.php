<?php

namespace Tests\Feature\Site;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class QuerySiteTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    protected $site;

    protected function setUp(): void
    {
        parent::setUp();
        $this->signIn();
        $this->site = create('App\Models\Site', null, ['title' => $this->faker()->sentence(2), 'user_id' => $this->user->id]);
    }
    /**
     * 获取站点列表
     * @test
     */
    public function accessToTheSiteList()
    {
        $response = $this->get('/api/site');

        $response->assertStatus(200)->assertJson([
            'status' => 'success'
        ]);
    }

    /**
     * 获取单个站点
     * @test
     */
    public function accessToTheSite()
    {
        $response = $this->get('/api/site/' . $this->site->id);

        $response->assertSuccessful()->assertJsonPath('data.id', $this->site->id);
    }
}
