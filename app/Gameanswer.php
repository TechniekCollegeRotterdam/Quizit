<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gameanswer extends Model
{
    public function game()
    {
        return $this->hasOne(Game::class);
    }

    public function answer()
    {
        return $this->hasOne(Answer::class);
    }
}
