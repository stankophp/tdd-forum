<?php


use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RepliesTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('replies')->delete();
    }
}