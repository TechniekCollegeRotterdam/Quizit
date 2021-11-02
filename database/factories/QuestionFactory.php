<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Question;
use Faker\Generator as Faker;
use App\Quiz;

$factory->define(Question::class, function (Faker $faker) {
    return [
        'question' => $faker->paragraph(1),
        'points' => $faker->numberBetween($int1 = 0, $int2 = 10),
        'answer1' => $faker->paragraph(1),
        'answer2' => $faker->paragraph(1),
        'answer3' => $faker->paragraph(1),
        'answer4' => $faker->paragraph(1),
        'correct' => $faker->randomElement(['answer1', 'answer2', 'answer3', 'answer4']),
        'quiz_id' => Quiz::all()->random()->id
    ];
});


