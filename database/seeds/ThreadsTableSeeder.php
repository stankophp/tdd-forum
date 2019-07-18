<?php


use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ThreadsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('threads')->delete();

        factory(App\Thread::class, 10)->create()->each(function ($thread) {
            /** @var \App\Thread $thread */
            factory(App\Reply::class, 10)->create(['thread_id' => $thread->id]);
        });
        
    }
}