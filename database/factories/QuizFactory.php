<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Quiz;
use Faker\Generator as Faker;

$factory->define(quiz::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'description' => $faker->text('150'),
    ];
});
