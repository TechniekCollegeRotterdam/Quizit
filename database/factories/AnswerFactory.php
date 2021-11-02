<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Answer;
use App\Question;
use Faker\Generator as Faker;



$factory->define(Answer::class, function (Faker $faker) {

    return [

        'correct_answer' => 'answer' . rand(1, 4),
        'question_id' => Question::all()->random()->id


    ];
});
