<?php

use Faker\Generator as Faker;

$factory->define(App\Post::class, function (Faker $faker) {
    $dateBegin = $faker->dateTimeBetween('now', '+4 month','Europe/Paris') ;

    return [
        'title' => $faker->sentence(rand(2,5)),
        'description' => $faker->paragraph(),
        'date_begin' =>$faker->dateTimeBetween('now', '+4 month','Europe/Paris') ,
        'date_end' =>$faker->dateTimeInInterval('4 months', '+4 month','Europe/Paris'),
        'price' =>$faker->randomFloat(2, 0, 10000.00),
        'max_stud' =>$faker->randomNumber(),
        'status' => $faker->randomElement(['published', 'unpublished']),
        'post_type' => $faker->randomElement(['formation', 'stage'])
    ];
});
