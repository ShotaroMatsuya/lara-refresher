<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Order;
use Faker\Generator as Faker;

$factory->define(Order::class, function (Faker $faker) {
    return [
        'order_date' => $faker->dateTime(),
        'order_value' => $faker->numberBetween(300, 600),
    ];
});
