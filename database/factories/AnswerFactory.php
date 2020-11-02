<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Answer;
use App\Question;
use Faker\Generator as Faker;

$factory->define(Answer::class, function (Faker $faker) {
    return [
        'answer' => $faker->paragraph('2'),
        'valid' => $faker->boolean(0),
        'question_id' => Question::all()->random()->id

    ];
});
