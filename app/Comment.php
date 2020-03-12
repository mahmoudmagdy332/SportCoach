<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public $table="comments";
    public function post(){
        return $this->belongsTo('App\Post');
    }
      public function trainee(){
        return $this->belongsTo('App\Trainee');
    }
}
