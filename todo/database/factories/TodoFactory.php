<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(App\Todo::class, function (Faker $faker) { //第一引数にModelクラスを指定
    return [
        //
        'name' => $faker->sentence(3),
        'description' => $faker->paragraph(4),
        'completed' => false

    ];
});
