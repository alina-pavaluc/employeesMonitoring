<?php

use App\User;
use Faker\Generator as Faker;

$factory->define(App\Task::class, function (Faker $faker) {
    return [
        'name' => $faker->sentence,
        'description' => $faker->text,
        'owner_id' => function () {
            return User::Employee()->pluck('id')->random();
        }
    ];
});
