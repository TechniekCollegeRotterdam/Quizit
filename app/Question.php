<?php

namespace App;

use Illuminate\Database\Eloquent\Model;



class Question extends Model
{

    protected $fillable = ['question', 'points', 'answer1', 'answer2', 'answer3', 'answer4',  'correct'];

    public function quiz()
    {
        return $this->belongsTo(Quiz::class);
    }


    public function correct_answer()
    {
        return $this->hasOne(Answer::class);
    }
}
