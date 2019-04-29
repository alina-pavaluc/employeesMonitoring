<?php

use App\User;
use Carbon\CarbonImmutable;
use Faker\Generator as Faker;

$factory->define(App\CheckIn::class, function (Faker $faker) {
    $dateTime = CarbonImmutable::parse($faker->dateTimeBetween($startDate = '-2 weeks', $endDate = 'now'));
    return [
        'checked_in_at' => $dateTime,
        'checked_out_at' => $faker->boolean(90) ? $dateTime->add('hour', $faker->numberBetween(6, 10)) : null,
        'employee_id' => function () {
            return User::Employee()->pluck('id')->random();
        }
    ];
});
