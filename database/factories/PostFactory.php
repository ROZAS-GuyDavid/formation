<?php

use Faker\Generator as Faker;

$factory->define(App\Post::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence(rand(2,5)),
        'description' => $faker->paragraph(),
        'date_begin' =>$faker->dateTime(),
        'date_end' =>$faker->dateTime(),
        'price' =>$faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 10000.00),
        'max_stud' =>$faker->randomNumber($nbDigits = NULL, $strict = false)
    ];
});
