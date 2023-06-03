<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'product_name' => ucfirst($faker->word(8)),
        'product_manufacturer' => ucfirst($faker->word(8)),
        'product_unit_price' => $faker->numberBetween(100, 500),
        'created_at' => $faker->dateTimeBetween('-4 years', '-2 years'),
        'updated_at' => $faker->dateTimeBetween('-1 year', '-2 months'),
    ];
});
