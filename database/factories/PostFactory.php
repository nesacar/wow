<?php

use Faker\Generator as Faker;

$factory->define(App\Post::class, function (Faker $faker) {
    return [
        'user_id' => 2,
        'category_id' => rand(3, 10),
        'town_id' => rand(1, 10),
        'title' => $faker->sentence(5),
        'slug' => str_slug($faker->sentence(5)),
        'short' => $faker->sentence(10),
        'body' => $faker->paragraphs(2, true),
        'image' => implode('',array_random(['maltaimage/1.jpg', 'maltaimage/2.jpg', 'maltaimage/3.jpg', 'maltaimage/4.jpg', 'maltaimage/5.jpg'], 1)),
        'sliderImage' => implode('',array_random(['maltaimage/slider/1.jpg', 'maltaimage/slider/2.jpg', 'maltaimage/slider/3.jpg', 'maltaimage/slider/4.jpg', 'maltaimage/slider/5.jpg'], 1)),
        'publish_at' => \Carbon\Carbon::now()->format('Y-d-m h:m:s'),
        'slider' => rand(0,1),
        'publish' => 1,
    ];
});
