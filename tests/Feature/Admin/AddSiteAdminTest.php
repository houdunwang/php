<?php

namespace Tests\Feature\Admin;

use App\Models\Site;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AddSiteAdminTest extends TestCase
{
    use RefreshDatabase;
    protected $site;

    protected function setUp(): void
    {
        parent::setUp();
        $this->signIn();

        $this->site = create(Site::class, null, ['user_id' => $this->user->id]);
    }
    /**
     * @test
     */
    public function addSiteAdmin()
    {
        $response = $this->postJson("/api/site/{$this->site->id}/admin", [
            'user_id' => $this->user->id
        ]);

        $response->assertStatus(200)->assertJson(['status' => 'success']);

        $this->assertEquals($this->site->admins()->count(), 1);
    }
}
