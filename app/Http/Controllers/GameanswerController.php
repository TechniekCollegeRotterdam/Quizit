<?php

namespace App\Http\Controllers;

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
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $question = question::with(['answer'=>function($query){
            $query->inRandomOrder();
        }]);
        session()->put($question);
        return view('public.gameAnswer.create',compact('question'));
//        return view('public.gameAnswer.create',compact('question'));
    }

    /**
     * Store a newly created resource in storage.np
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $question = session()->get('question');
        $game = session()->get('game');
        if ($question!=null)
        {
            //        dd($request);
            $gameAnswer = new Gameanswer();
            $gameAnswer->game_id = $game;
            $gameAnswer->answer_id = $request->answer_id;
            $gameAnswer->save();
            return redirect()->route('gameAnswer.create')->with('message', 'Antwoord opgeslagen');
        }
        else
        {
            return redirect()->route('game.show')->with('message', 'Antwoord opgeslagen');
        }
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
