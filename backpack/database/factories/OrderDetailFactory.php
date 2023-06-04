<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\OrderDetail;
use Faker\Generator as Faker;

$factory->define(OrderDetail::class, function (Faker $faker) {
    return [
        'product_amount' => $faker->numberBetween(1,5),
        'product_code' => $faker->unique()->ean13,
    ];
});
