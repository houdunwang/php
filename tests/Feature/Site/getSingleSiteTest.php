<?php

namespace Tests\Feature\Site;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class getSingleSiteTest extends TestCase
{
    /**
     * 获取单个站点
     * @test
     */
    public function getSingleSiteData()
    {
        $response = $this->get('/api/site/' . $this->site->id);

        $response->assertSuccessful()->assertJsonPath('data.id', $this->site->id);
    }
}
