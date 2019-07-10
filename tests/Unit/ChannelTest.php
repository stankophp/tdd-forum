<?php

namespace Tests\Unit;

use App\Channel;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class ChannelTest extends TestCase
{
    use DatabaseMigrations;

    /** @var Channel $channel */
    protected $channel;

    public function setUp(): void
    {
        parent::setUp();

        $this->channel = create('App\Channel');
    }

    /** @test */
    public function a_channel_has_replies()
    {
        /** @var Channel $channel */
        $channel = create('App\Channel');
        $thread1 = create('App\Thread', ['channel_id' => $channel->id]);
        $thread2 = create('App\Thread');
        $this->assertTrue($channel->threads->contains($thread1));
        $this->assertFalse($channel->threads->contains($thread2));
    }
}
