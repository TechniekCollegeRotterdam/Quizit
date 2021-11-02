<?php

use Illuminate\Database\Seeder;
use App\Question;
use App\Quiz;
use App\Answer;

class QuizSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Quiz::class, 3)->create()
            ->each(function ($quiz) {

                $quiz->questions()->saveMany(factory(Question::class, 10)
                    ->create(['quiz_id' => $quiz->id])
                    ->each(function ($question) {

                        $question->correct_answer()->saveMany(factory(Answer::class, 1))
                            ->create(['question_id' => $question->id, 'correct_answer' => $question->correct]);

                    }));
            });
    }
}


