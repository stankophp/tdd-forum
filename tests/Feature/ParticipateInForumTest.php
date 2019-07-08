<?php

namespace Tests\Feature;

use App\Reply;
use App\Thread;
use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Auth\AuthenticationException;

class ParticipateInForumTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function an_authenticated_user_may_participate()
    {
        /** @var User $user */
        $user = factory('App\User')->create();
        $this->be($user);

        /** @var Thread $thread */
        $thread = factory('App\Thread')->create();

        /** @var Reply $reply */
        $reply = factory('App\Reply')->make();

        $this->post($thread->path().'/replies', $reply->toArray());

        $this->get($thread->path())
            ->assertSee($reply->body);
    }

    /** @test */
    public function non_authenticated_user_may_not_participate()
    {
        $this->expectException('Illuminate\Auth\AuthenticationException');

        $this->post('threads/1/replies', []);
    }
}
