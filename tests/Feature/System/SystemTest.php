<?php

namespace Tests\Feature\Config;

use App\Models\Config;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SystemTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    protected $seed = true;

    /**
     * 表单验证
     * @test
     */
    public function updateSystemFormValidation()
    {
        $response = $this->putJson('/api/system', [
            'name' => $this->faker()->word(),
            'tel' => $this->faker()->phoneNumber()
        ]);
        $response->assertStatus(422);
    }

    /**
     * 获取配置项
     * @test
     */
    public function accessToConfigurationItems()
    {
        $response = $this->getJson('/api/config/system');
        $response->assertSuccessful();
    }
}
