<?php

namespace Tests\Feature\Site;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class getSiteListTest extends TestCase
{
    /**
     * 获取站点列表
     * @test
     */
    public function getSiteList()
    {
        $response = $this->get('/api/site');

        $response->assertStatus(200)->assertJson([
            'data' => []
        ]);
    }
}
