<?php

namespace Tests\Unit;

use App\Reply;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ReplyTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function it_has_an_owner()
    {
        /** @var Reply $reply */
        $reply = factory('App\Reply')->create();
        $this->assertInstanceOf('App\User', $reply->owner);
    }
}
