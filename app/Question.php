<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
     public $table="questions";
    public function answers(){
        return $this->hasMany('App\Answer');
    }
     public function trainee(){
        return $this->belongsTo('App\Trainee');
    }
}
