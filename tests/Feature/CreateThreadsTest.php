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

        $response = $this->post('/threads', $thread->toArray());

//        $this->get('/threads/'.$thread->channel->slug.'/1')
        $this->get($response->headers->get('Location'))
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

    /** @test */
    public function a_thread_requires_a_title()
    {
        $this->publishThread(['title' => null])
            ->assertSessionHasErrors('title');
    }

    /** @test */
    public function a_thread_requires_a_body()
    {
        $this->publishThread(['body' => null])
            ->assertSessionHasErrors('body');
    }

    /** @test */
    public function a_thread_requires_a_valid_channel()
    {
        factory('App\Channel', 3)->create();

        $this->publishThread(['channel_id' => null])
            ->assertSessionHasErrors('channel_id');

        $this->publishThread(['channel_id' => 999])
            ->assertSessionHasErrors('channel_id');

        $this->publishThread(['channel_id' => 1])
            ->assertSessionHasNoErrors();
    }

    protected function publishThread($params)
    {
        $this->withExceptionHandling()
            ->signIn();

        $thread = make('App\Thread', $params);

        return $this->post('/threads', $thread->toArray());
    }
}
