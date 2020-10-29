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
                $quiz->questions()->saveMany(factory(Question::class, rand(5, 10))->make())->each(function ($question){
                        $question->answer()->saveMany(factory(Answer::class, 4)->make());

                    });
    });
        $questions = Question::all();

        foreach($questions as $question){
            $option_id = $question->answer->random()->id;
            $option = Answer::find($option_id);
            $option->valid = 1;
            $option->save();

        }
    }
}
