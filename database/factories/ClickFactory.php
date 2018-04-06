<?php

use Faker\Generator as Faker;

$factory->define(App\Click::class, function (Faker $faker) {
    return [
        'newsletter_id' => 19,
        'post_id' => rand(1, 6),
        'banner_id' => 0,
        'subscriber_id' => rand(4, 53),
        'created_at' => $faker->dateTimeBetween('-30 days', 'now'),
        'updated_at' => $faker->dateTimeBetween('-30 days', 'now'),
    ];
});
