<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
     public $table="answers";
    public function coache(){
        return $this->belongsTo('App\Coache');
    }
      public function question(){
        return $this->belongsTo('App\Question');
    }
}
