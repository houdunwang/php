<?php

namespace Tests\Feature\Config;

use App\Models\Config;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ConfgTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    protected $seed = true;

    public function setUp(): void
    {
        parent::setUp();
        $this->signIn();
    }

    /**
     * 更新网站配置
     * @test
     */
    public function updateSiteConfiguration()
    {
        $response = $this->putJson('/api/config/system', [
            'name' => $this->faker()->word(),
            'tel' => $this->faker()->phoneNumber()
        ]);

        $response->assertSuccessful();
    }

    /**
     * 获取配置项
     * @test
     */
    public function accessToConfigurationItems()
    {
        $response = $this->getJson('/api/config/system');
        $response->dd();
        $response->assertSuccessful();
    }
}
