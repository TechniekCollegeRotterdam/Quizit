<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model


{
    //
    protected $fillable = ['id', 'correct_answer', 'question_id'];

    public function question()
    {
        return $this->belongsTo(Question::class);
    }

    public function game_answer()
    {
        return $this->hasMany(Gameanswer::class);
    }


    public function id()
    {
        return $this->belongsTo(Answer::class);

    }
}
