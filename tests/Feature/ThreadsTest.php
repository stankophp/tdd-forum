<?php

namespace Tests\Feature;

use App\Thread;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ThreadsTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function a_user_can_browse_threads()
    {
        /** @var Thread $thread */
        $thread = factory('App\Thread')->create();
        $response = $this->get('/threads');

        $response->assertStatus(200);
        $response->assertSee($thread->title);
    }

    /** @test */
    public function a_user_can_view_single_thread()
    {
        /** @var Thread $thread */
        $thread = factory('App\Thread')->create();

        $response = $this->get('/threads/'. $thread->id);
        $response->assertStatus(200);
        $response->assertSee($thread->title);
    }
}
