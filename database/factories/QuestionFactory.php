<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Question;
use Faker\Generator as Faker;
use App\Quiz;

$factory->define(Question::class, function (Faker $faker) {
    return [
        'question' => $faker->paragraph(4),
        'points' => $faker->numberBetween($int1 = 0, $int2 = 10),
        'quiz_id' =>quiz::all()->random()->id
    ];
});
