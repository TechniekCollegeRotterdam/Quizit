<?php

namespace App\Http\Controllers;

use App\Http\Requests\QuizStoreRequest;
use App\Http\Requests\QuizUpdateRequest;
use App\Quiz;
use Illuminate\Http\Request;
use Throwable;


class QuizController extends Controller
{

    /** Set permissions on methods ...*/
    public  function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:create quiz', ['only' => ['create', 'store']]);
        $this->middleware('permission:edit quiz', ['only' => ['edit', 'update']]);
        $this->middleware('permission:delete quiz', ['only' => ['delete', 'destroy']]);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $quizzes = Quiz::with('questions')->get();

        return view('admin.quizzes.index', compact('quizzes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $quizzes = Quiz::all();
        return view('admin.quizzes.create', compact('quizzes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(QuizStoreRequest $request)
    {
        $quiz = new Quiz();
        $quiz->name = $request->name;
        $quiz->description = $request->description;
        $quiz->save();

        return redirect()->route('quizzes.index')->with('message', 'Quiz toegevoegd');
    }





    /**
     * Display the specified resource.
     *
     * @param  \App\Quiz  $quiz
     * @return \Illuminate\Http\Response
     */
    public function show(Quiz $quiz)
    {
        return view('admin.quizzes.show', compact('quiz'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Quiz  $quiz
     * @return \Illuminate\Http\Response
     */
    public function edit(Quiz $quiz)
    {


        return view('admin.quizzes.edit', compact('quiz'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Quiz  $quiz
     * @return \Illuminate\Http\Response
     */
    public function update(QuizUpdateRequest $request, Quiz $quiz)
    {
        $quiz->name = $request->name;
        $quiz->description = $request->description;
        $quiz->save();
        return redirect()->route('quizzes.index')->with('message','Quiz geupdate');
    }


    //** show the form for deleting the specified resource. ...*/*/
    public function delete(quiz $quiz)
    {
        return view('admin.quizzes.delete', compact('quiz'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Quiz  $quiz
     * @return \Illuminate\Http\Response
     */
    public function destroy(Quiz $quiz)
    {
        try {
            $quiz->delete();
        } catch (Throwable $e){
            report($e);
            return redirect()->route('quizzes.index')->with('wrong','quiz bevat vragen.
            Verwijder deze alvorens deze quiz te verwijderen.');
        }
        $quiz->delete();
        return  redirect()->route('quizzes.index')->with('message','quiz Verwijderd');
    }
}
