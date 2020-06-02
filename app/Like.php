<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
 public $table="likes";
    public function post(){
        return $this->belongsTo('App\Post');
    }
      public function trainee(){
        return $this->belongsTo('App\Trainee');
    }
}
