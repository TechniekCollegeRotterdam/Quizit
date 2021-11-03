<?php

namespace App\Http\Controllers;

use App\Answer;
use App\Http\Requests\QuestionStoreRequest;
use App\Http\Requests\t;
use App\Http\Requests\QuestionUpdateRequest;
use App\Question;
use App\Quiz;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Sabberworm\CSS\Rule\Rule;


class QuestionController extends Controller
{

    /** Set permissions on methods ...*/

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:create question', ['only' => ['create', 'store']]);
        $this->middleware('permission:edit question', ['only' => ['edit', 'update']]);
        $this->middleware('permission:delete question', ['only' => ['delete', 'destroy']]);
    }

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
    public function create(Quiz $quiz, Answer $answer, Question $question)
    {
        return view('admin.questions.create', compact('quiz', 'answer', 'question'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(QuestionStoreRequest $request, Question $question, Answer $answer)
    {
        $question = new Question();
        $question->question = $request->question;
        $question->points = $request->points;
        $question->answer1 = $request->answer1;
        $question->answer2 = $request->answer2;
        $question->answer3 = $request->answer3;
        $question->answer4 = $request->answer4;
        $question->correct = $request->correct;
        $question->quiz_id = $request->quiz_id;
        $question->save();


        $correctanswer = $question->correct;

        $answer = new Answer();
        $answer->correct_answer = $correctanswer;
        $answer->question_id = $question->id;
        $answer->save();

        if
        ($request->has('AddQuestion')) {
            return redirect()->route('admin.questions.create', ['quiz' => $request->quiz_id])->with('message', 'vraag en antwoorden toegevoegd');
        }

        elseif
        ($request->has('PublishQuestion')) {
            return redirect()->route('quizzes.index')->with('message', 'vraag en antwoorden toegevoegd');
        }

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
     * @param \App\Question $question
     * @param Answer $answer
     * @return \Illuminate\Http\Response
     */
    public function edit(Question $question)
    {
        $quizzes = Quiz::all();
        return view('admin.questions.edit', compact('question', 'quizzes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param QuestionUpdateRequest $request
     * @param \App\Question $question
     * @param Answer $answer
     * @return \Illuminate\Http\Response
     */
    public function update(QuestionUpdateRequest $request, Question $question, Answer $answer)
    {



        $question_id = $question->id;


        $question->question = $request->question;
        $question->points = $request->points;
        $question->answer1 = $request->answer1;
        $question->answer2 = $request->answer2;
        $question->answer3 = $request->answer3;
        $question->answer4 = $request->answer4;
        $question->correct = $request->correct;
        $question->quiz_id = $request->quiz_id;
        $question->save();


        $correctanswer = $question->correct;
        $answer->id = $answer->incrementing;

     $answer = Answer::updateOrCreate(
         ['question_id' => $question->id],

         [
             'correct_answer' => $correctanswer,
             'question_id' => $question_id,
             ]
     );



        $answer->save();


        return redirect()->route('quizzes.index')->with('message', 'Vraag geupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */

    //** show the form for deleting the specified resource. ...*/*/
    public function delete(Question $question)
    {
        return view('admin.questions.delete', compact('question'));
    }

    public function destroy(Question $question)
    {
        $question->delete();
        return  redirect()->route('quizzes.index')->with('message','Vraag Verwijderd');
    }
}
