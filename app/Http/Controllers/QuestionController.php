<?php

namespace App\Http\Controllers;

use App\Answer;
use App\Http\Requests\QuestionStoreRequest;
use App\Http\Requests\QuestionUpdateRequest;
use App\Question;
use App\Quiz;
use Illuminate\Http\Request;


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
    public function create(Quiz $quiz)
    {
        return view('admin.questions.create', compact('quiz'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
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
     * @param Quiz $quiz
     * @param \App\Question $question
     * @return \Illuminate\Http\Response
     */
    public function edit(Question $question)
    {
        $quizzes = Quiz::all();

        $answers = Answer::where('question_id', $question->id)->orderBy('valid', 'DESC')->get();
        return view('admin.questions.edit', compact('question', 'quizzes', 'answers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param QuestionUpdateRequest $request
     * @param \App\Question $question
     * @param Quiz $quiz
     * @return \Illuminate\Http\Response
     */
    public function update(QuestionUpdateRequest $request, Question $question, Answer $answer)
    {
        $question->question = $request->question;
        $question->points = $request->points;
        $question->quiz_id = $request->quiz_id;
        $question->save();

        if ($question->goodanswer != $request->goodanswer) {
            $answer->answer = $request->goodanswer;
            $answer->valid = 1;
            $answer->question_id = $question->id;
            $answer->save();
        }

        if ($question->wronganswer1 != $request->wronganswer1) {
            $wronganswer1 = $answer;
            $wronganswer1->answer = $request->wronganswer1;
            $wronganswer1->valid = 0;
            $wronganswer1->question_id = $question->id;
            $wronganswer1->save();
        }

        if ($question->wronganswer2 != $request->wronganswer2) {
            $wronganswer2 = $answer;
            $wronganswer2->answer = $request->wronganswer2;
            $wronganswer2->valid = 0;
            $wronganswer2->question_id = $question->id;
            $wronganswer2->save();
        }

        if ($question->wronganswer3 != $request->wronganswer3) {
            $wronganswer3 = $answer;
            $wronganswer3->answer = $request->wronganswer3;
            $wronganswer3->valid = 0;
            $wronganswer3->question_id = $question->id;
            $wronganswer3->save();
        }




        return redirect()->route('quizzes.index')->with('message', 'Vraag geupdate');
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
