<?php

namespace Tests\Feature\Site;

use App\Models\Site;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UpdateSiteTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    protected $site;

    protected function setUp(): void
    {
        parent::setUp();
        $this->signIn();
        $this->site = create(Site::class, null, ['title' => $this->faker()->word(), 'user_id' => 1]);
    }

    /**
     * 表单字段验证
     * @test
     */
    public function formFieldValidation()
    {
        $response = $this->putJson('/api/site/' . $this->site->id, [
            'title' => '',
            'url' => $this->faker()->word()
        ])->assertStatus(422);

        $response->assertJsonValidationErrors(['title', 'url']);
    }


    /**
     * 站点标题不能重复
     * @test
     */
    public function siteTitleCannotBeRepeated()
    {
        $site = create(Site::class, null, ['user_id' => $this->user->id]);
        $site2 = create(Site::class, null, ['user_id' => $this->user->id]);

        $response = $this->putJson('/api/site/' . $site2->id, [
            'title' => $site->title,
        ])->assertStatus(422);

        $response->assertJsonValidationErrors(['title']);
    }

    /**
     * 成功更新站点
     * @test
     */
    public function successfulUpdateSite()
    {
        $this->putJson('/api/site/' . $this->site->id, [
            'title' => $this->faker()->word()
        ])->assertStatus(200);
    }
}
