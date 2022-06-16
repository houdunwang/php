<?php

namespace Tests;

use App\Models\Site;
use App\Models\User;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    protected $user;
    protected $site;
    protected $seed = true;

    protected function setUp(): void
    {
        parent::setUp();
        $this->signIn(User::find(1));
        $this->site = Site::find(1);
    }

    protected function signIn(User $user = null)
    {
        $user = $user ?? create(User::class);
        $this->actingAs($user);

        $this->user = $user;
        return $this;
    }
}
