<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    //
    public function question()
    {
        return $this->belongsTo(Question::class);
    }

    public function game_answer()
    {
        return $this->hasMany(Gameanswer::class);
    }
}
