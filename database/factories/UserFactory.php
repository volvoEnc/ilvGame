<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use Faker\Generator as Faker;

$factory->define(User::class, function (Faker $faker) {
    return [
        "nickname" => $faker->lastName,
        "email" => $faker->unique()->safeEmail,
        "money" => random_int(0, 1000),
        "status" => $faker->randomElement(['active', 'active', 'active', 'active', 'ban'])
    ];
});
