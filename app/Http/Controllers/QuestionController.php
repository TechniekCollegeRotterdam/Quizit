<?php

namespace App\Http\Controllers;

use App\Answer;
use App\Http\Requests\QuestionStoreRequest;
use App\Question;
use App\Quiz;
use DB;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Quiz $quiz
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Quiz $quiz
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Quiz $quiz)
    {
        return view('admin.questions.create', compact('quiz'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(QuestionStoreRequest $request)
    {
        $question = new Question();
        $question->question = $request->question;
        $question->points = $request->points;
        $question->quiz_id = $request->quiz_id;
        $question->save();

        $goodanswer = new Answer();
        $goodanswer->answer = $request->goodanswer;
        $goodanswer->valid = 1;
        $goodanswer->question_id = $question->id;
        $goodanswer->save();


        $wronganswer1 = new Answer();
        $wronganswer1->answer = $request->wronganswer1;
        $wronganswer1->valid = 0;
        $wronganswer1->question_id = $question->id;
        $wronganswer1->save();

        $wronganswer2 = new Answer();
        $wronganswer2->answer = $request->wronganswer2;
        $wronganswer2->valid = 0;
        $wronganswer2->question_id = $question->id;
        $wronganswer2->save();

        $wronganswer3 = new Answer();
        $wronganswer3->answer = $request->wronganswer3;
        $wronganswer3->valid = 0;
        $wronganswer3->question_id = $question->id;
        $wronganswer3->save();




        return redirect()->route('quizzes.index')->with('message', 'vraag en antwoorden toegevoegd');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function show(Question $question)
    {
        return view('admin.questions.show', compact('question'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function edit(Question $question)
    {
        return view('admin.quizzes.edit', compact('question'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Question $question)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */

    //** show the form for deleting the specified resource. ...*/*/
    public function delete(quiz $question)
    {
        return view('admin.questions.delete', compact('question'));
    }

    public function destroy(Question $question)
    {
        $question->delete();
        return  redirect()->route('quizzes.index')->with('message','vraag Verwijderd');
    }
}
