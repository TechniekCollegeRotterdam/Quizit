<?php


namespace App;


use Illuminate\Database\Eloquent\Model;


class Design extends Model
{
    public $table = 'designs';
    protected $fillable = ['name','link'];
}
