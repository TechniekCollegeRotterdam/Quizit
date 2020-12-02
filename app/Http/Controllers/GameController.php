<?php

namespace App\Http\Controllers;

use App\Game;
use App\Http\Requests\GameStoreRequest;
use App\Quiz;
use Illuminate\Http\Request;

class GameController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $request->session()->forget('play','game','quiz','question_list');
        $game = Game::all();
        return view('public.game.index', compact('game'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $play=$request->session()->get('play');
        if (!empty($play))
        {
            return redirect(route('game.index'));
        }

        else
        {
            $user = auth()->user();
            $quizzes = quiz::all();
            return view('public.game.create', compact('quizzes','user'));
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        dd($request);
        $game = new Game();
        $game->quiz_id = $request->quiz_id;
        $game->user_id = $request->user_id;
        $game->save();
        $request->session()->put('game', $game->id);
        $request->session()->put('quiz', $game->quiz_id);
        $request->session()->forget('question_list');
        return redirect()->route('gameAnswer.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function show(Game $game)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function edit(Game $game)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Game $game)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function destroy(Game $game)
    {
        //
    }
}
