<?php

namespace Tests\Unit;

use App\Thread;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class ThreadTest extends TestCase
{
    use DatabaseMigrations;

    /** @var Thread $thread */
    protected $thread;

    public function setUp(): void
    {
        parent::setUp();

        $this->thread = create('App\Thread');
    }

    /** @test */
    public function a_thread_has_replies()
    {
        $this->assertInstanceOf('Illuminate\Database\Eloquent\Collection', $this->thread->replies);
    }

    /** @test */
    public function a_thread_has_creator()
    {
        $this->assertInstanceOf('App\User', $this->thread->creator);
    }

    /** @test */
    public function a_thread_can_add_replies()
    {
        $this->thread->addReply([
            'body' => 'some body',
            'user_id' => 1
        ]);
        $this->assertCount(1, $this->thread->replies);
    }

    /** @test */
    public function a_thread_belongs_to_channel()
    {
        $this->assertInstanceOf('App\Channel', $this->thread->channel);
    }


    /** @test */
    public function a_thread_can_make_a_string_path()
    {
        $this->assertEquals('threads/' . $this->thread->channel->slug . '/' . $this->thread->id, $this->thread->path());
    }
}
