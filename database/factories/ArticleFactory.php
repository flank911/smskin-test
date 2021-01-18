<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Article;
use Faker\Generator as Faker;

$factory->define(Article::class, function (Faker $faker) {
    return [
        'title' => $faker->paragraph(1),
        'slug' => $faker->paragraph(1),
        'description' => $faker->paragraph(2),
        'body' => $faker->paragraph(3),
        'created_at' => $faker->dateTime('now'),
    ];
});
