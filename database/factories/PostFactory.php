<?php

use Faker\Generator as Faker;

$factory->define(App\Post::class, function (Faker $faker) {
    return [
        'user_id' => 2,
        'category_id' => rand(1, 8),
        'town_id' => rand(0, 10),
        'title' => $faker->sentence(5),
        'slug' => str_slug($faker->sentence(5)),
        'short' => $faker->paragraphs(1, true),
        'body' => $faker->paragraphs(2, true),
        'image' => implode('',array_random(['storage/maltaimage/1.jpg', 'storage/maltaimage/2.jpg', 'storage/maltaimage/3.jpg', 'storage/maltaimage/4.jpg'], 1)),
        'publish_at' => \Carbon\Carbon::now(),
        'slider' => rand(0,1),
        'publish' => 1,
    ];
});
