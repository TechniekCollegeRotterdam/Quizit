<?php

namespace App\Http\Controllers;

use App\Design;
use App\Game;
use App\Quiz;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;

class PDFController extends Controller
{
    // Generate UserPDF
    public function generateUSerPDF()
    {
        $user = auth()->user();
//        dd($user);
        $user_id= $user->id;
//        echo $user_id;
        $design_id=$user->design_id;
//        echo $user->design_id;

        $qames = Game::where('user_id', $user_id)->get();

        if (isset($games))
        {
            foreach ($qames as $game) {
                $quiz_id[] = $game->quiz_id;
            }
            $quiz = Quiz::whereIn('id', $quiz_id)->get();
        }
        else
        {
            $quiz = null;
        }

        $design = Design::where('id',$design_id)->get();

        $data = [
            'username' => $user->name,
            'email' => $user->email,
            'aangemaakt' => $user->created_at,
            'quizzes' => $quiz,
            'design' => $design[0]->name,
        ];

        $pdf = PDF::loadView('public.user.generate_pdf', $data);

        return $pdf->download('Gebruikers-informatie.pdf');
    }
}
