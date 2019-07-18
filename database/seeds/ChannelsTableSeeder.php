<?php


use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ChannelsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('channels')->delete();

//        factory(App\Channel::class, 10)->create();
    }
}