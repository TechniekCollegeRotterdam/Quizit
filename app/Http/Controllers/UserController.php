<?php

namespace App\Http\Controllers;

use App\Answer;
use App\Design;
use App\Game;
use App\Http\Requests\DesignUpdateRequest;
use App\Quiz;
use App\User;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param User $user
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $user = auth()->user();
//        dd($user);
        $user_id= $user->id;
//        echo $user_id;
        $design_id=$user->design_id;
//        echo $user->design_id;

        $qames = Game::where('user_id', $user_id)->get();

        foreach ($qames as $game)
        {
            $quiz_id[]=$game->quiz_id;
        }
        $quiz = Quiz::whereIn('id', $quiz_id)->get();

        $design = Design::where('id',$design_id)->get();

//        dd($design[0]->name);

        return view('public.user.index', compact('quiz','user','design'));
    }

}
