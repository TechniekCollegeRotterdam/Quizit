<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    public function questions()
    {
        return $this->hasMany(Question::class);
    }

    public function game()
    {
        return $this->hasMany(Game::class);
    }

    public function question()
    {
        return $this->BelongsTo(Question::class);
    }
}
