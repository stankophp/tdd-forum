<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Channel;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(Channel::class, function (Faker $faker) {
    $name = $faker->name;
    return [
        'name' => $name,
        'slug' => strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $name))),
    ];
});
