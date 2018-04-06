<?php

use Faker\Generator as Faker;

$factory->define(App\Subscriber::class, function (Faker $faker) {
    return [
        'email' => $faker->email,
        'verification' => str_random(20),
        'block' => 0,
    ];
});
