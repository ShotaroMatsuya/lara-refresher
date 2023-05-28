<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */


use Faker\Generator as Faker;

$factory->define(App\Comment::class, function (Faker $faker) {
    return [
        'content' => $faker->text(500),
        'user_id' => $faker->numberBetween(1,2000),
        'rating' => $faker->numberBetween(1,5),
        'commentable_type' => $faker->randomElement(['App\Room', 'App\Image']),
        'commentable_id' => $faker->numberBetween(1, 10),
    ];
});

