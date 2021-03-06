<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trainee extends Model
{
     public $table="trainees";
    public function comments(){
        return $this->hasMany('App\Comment');
    }
    public function likes(){
        return $this->hasMany('App\Like');
    }
     public function questions(){
        return $this->hasMany('App\Question');
    }
}
