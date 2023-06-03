<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Client;
use Faker\Generator as Faker;

$factory->define(Client::class, function (Faker $faker) {
    return [
        'client_name' => $faker->name(),
        'client_address' => $faker->address,
        'client_city' => $faker->city,
        'client_postal_code' => $faker->postcode,
        'created_at' => $faker->dateTimeBetween('-4 years', '-2 years'),
        'updated_at' => $faker->dateTimeBetween('-1 year', '-2 months'),
    ];
});
