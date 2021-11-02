<?php

namespace App\Http\Controllers;

use App\Answer;
use App\Game;
use App\Gameanswer;
use App\Question;
use App\Quiz;
use Illuminate\Http\Request;

class GameanswerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {



        $play=$request->session()->get('play');
        $quiz=$request->session()->get('quiz');
//        dd($question_list);

        if (!isset($play))
        {
            $questions = Question::where('quiz_id', $quiz)
                ->inRandomOrder()
                ->get();

            foreach ($questions as $questioninfo)
            {
                echo $questioninfo->id;
                $request->session()->push('question_list',$questioninfo->id);
            }
            echo '<br>';
            echo 'key0:',$request->session()->get('question_list')[0];
            $request->session()->put('play',1);
        }

        $question_list=$request->session()->get('questions_list');

//        dd($request->session()->get('question_list'));
//        dd($play);

        if (isset($question_list))
        {
            $question_this=$request->session()->pull('question_list')[0];
//            dd($question_this);
            $question = Question::where('id', $question_this);

            $answers = Answer::where('question_id', $question_this)
                ->inRandomOrder()
                ->get();
            return view('public.gameAnswer.create',compact('question','answers','quiz','game'));
        }

        if (!isset($question_list) and isset($play))
        {
            echo 'Dit zie je alleen als het niet werkt!!';
        }

    }

    /**
     * Store a newly created resource in storage.np
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $question_id = $request->session()->get('question_id');
        dd($question_id);
        $game = session()->get('game');
        $gameAnswer = new Gameanswer();
        $gameAnswer->game_id = $game;
        $gameAnswer->answer_id = $request->answer_id;
        $gameAnswer->save();


        if (isset($question_id))
        {
            $request->session()->push('question_list', $question_id);
        }

        return redirect()->route('gameAnswer.create')->with('message', 'Antwoord opgeslagen');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Gameanswer  $gameanswer
     * @return \Illuminate\Http\Response
     */
    public function show(Gameanswer $gameanswer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Gameanswer  $gameanswer
     * @return \Illuminate\Http\Response
     */
    public function edit(Gameanswer $gameanswer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Gameanswer  $gameanswer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Gameanswer $gameanswer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Gameanswer  $gameanswer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Gameanswer $gameanswer)
    {
        //
    }
}
