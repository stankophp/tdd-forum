<?php

namespace Tests\Feature;

use App\Thread;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class CreateThreadsTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function an_authenticated_user_may_create_new_threads()
    {
        $this->signIn();

        /** @var Thread $thread */
        $thread = make('App\Thread');

        $this->post('/threads', $thread->toArray());

        $this->get('/threads/'.$thread->channel->slug.'/1')
            ->assertSee($thread->title)
            ->assertSee($thread->body);

    }

    /** @test */
    public function guests_may_not_see_create_new_threads_form()
    {
        $this->expectException('Illuminate\Auth\AuthenticationException');

        $this->get('/threads/create');

    }

    /** @test */
    public function guests_may_not_create_new_threads()
    {
        $this->expectException('Illuminate\Auth\AuthenticationException');

        /** @var Thread $thread */
        $thread = make('App\Thread');

        $this->post('/threads', $thread->toArray());
    }
}
