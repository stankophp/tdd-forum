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
        $user = create('App\User');
        $this->actingAs($user);

        /** @var Thread $thread */
        $thread = create('App\Thread');

        /** @var Reply $reply */
        $reply = make('App\Reply');

        $this->post($thread->path().'/replies', $reply->toArray());

        $this->get($thread->path())
            ->assertSee($reply->body);
    }

    /** @test */
    public function non_authenticated_user_may_not_participate()
    {
        $this->expectException('Illuminate\Auth\AuthenticationException');

        $this->post('threads/asd/1/replies', []);
    }
}
